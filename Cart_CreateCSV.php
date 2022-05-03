<?php

/* -------------------------------------------------------------------------------

BSD 3-Clause License

Copyright (c) 2019, Filmote and Mr.Blinky
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution.

3. Neither the name of the copyright holder nor the names of its
   contributors may be used to endorse or promote products derived from
   this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

------------------------------------------------------------------------------- */

// V1.08

    #CSV indices
    const ID_LIST = 0;
    const ID_TITLE = 1;
    const ID_TITLESCREEN = 2;
    const ID_HEXFILE = 3;
    const ID_DATAFILE = 4;
    const ID_SAVEFILE = 5;
    const ID_VERSION = 6;
    const ID_DEVELOPER = 7;
    const ID_INFO = 8;
    const ID_LIKES = 9;
    const ID_MAX = 10;

    $blankimage = str_repeat(chr(0xFF), 1024);
    $blankprogram = str_repeat(chr(0xFF), 29 * 1024);

    $MenuButtonPatch = hex2bin("0f920fb68f939f93ef93ff938091cc01" .
                              "8d5f8d3708f08d578093cc01e2e4f3e0" .
                              "80818e4f808391819f4f918382818f4f" .
                              "828383818f4f8383edecf1e080818f5f" .
                              "808381818f4f818382818f4f82838381" .
                              "8f4f83838fb18f6066991c9b88278f36" .
                              "81f48091FF0A981b963068f0e0e0f8e0" .
                              "87e78083818388e180936000f0936000" .
                              "ffcf9093FF0Aff91ef919f918f910fbe" .
                              "0f901895");
    const MBP_fract_lds = 14;
    const MBP_fract_sts = 26;
    const MBP_millis_r30 = 28;
    const MBP_millis_r31 = 30;
    const MBP_overflow_r30 = 56;
    const MBP_overflow_r31 = 58;

    function BuildFailed($reason)
    {
      Echo "<h1>5FX - Flash image build error</h1><p>Reason:" . $reason;
      die();
    }

    function FixPath($filename)
    {
      $filename = str_replace("\\", "/", $filename);
      If ($filename != "" && !is_file($filename))
      {
        BuildFailed('<p>Unable to load file "' . $filename . '".</p><p>Check your CSV file for correct filename and case.</p>');
      }
      return $filename;
    }

    function DefaultHeader()
    {
      return "ARDUBOY" . str_repeat(chr(0xFF),249);
    }

    function LoadTitleScreenData($filename)
    {
      global $blankimage;
      if (!is_file($filename)) return false;

      $tmp = @imageCreateFromPng($filename);
      $img = imagecreatetruecolor(128,64);
      @imagecopyresampled($img, $tmp, 0, 0, 0, 0, 128, 64, @imagesx($tmp), @imagesy($tmp));
      imageDestroy($tmp);
      $bytes = $blankimage;
      $i = 0;
      $b = 0;
      for ($y = 0; $y < 64; $y += 8 )
      {
        for ($x = 0; $x < 128; $x++)
        {
          for ($p = 0; $p < 8; $p++)
          {
             $b = $b >> 1;
             if (imagecolorat($img, $x, $y + $p) > 0) $b = $b | 0x80;
          }
          $bytes[$i] = chr($b);
          $i++;
        }
      }
      imageDestroy($img);
      return $bytes;
    }

    function LoadHexFileData($filename)
    {
      global $blankprogram;
      if (!is_file($filename)) return false;
      if ($file = fopen($filename, "r"))
      {
        $bytes = $blankprogram;
        $flash_end = 0;
        while(!feof($file))
        {
          $rcd = fgets($file);
          if ($rcd !== false && $rcd[0] == ":")
          {
            $rcd = @pack("H*",substr($rcd,1));
            $rcd_len  = ord($rcd[0]);
            $rcd_typ  = ord($rcd[3]);
            $rcd_addr = ord($rcd[1]) * 256 + ord($rcd[2]);
            $checksum = ord($rcd[4 + $rcd_len]);
            if (($rcd_typ == 0) && ($rcd_len > 0))
            {
              $flash_addr = $rcd_addr;
              for ($i = 0; $i < 4 + $rcd_len; $i++)
              {
                $checksum += ord($rcd[$i]);
                if ($i >= 4)
                {
                  $bytes[$flash_addr] = $rcd[$i];
                  $flash_addr ++;
                }
              }
              if ($flash_addr > $flash_end) $flash_end = $flash_addr;
              if ($checksum & 0xFF != 0) return false;
            }
          }
        }
        $flash_end = ($flash_end + 255) & 0xFF00;
        return substr($bytes, 0, $flash_end);
      }
      else return false;
    }

    function LoadDataFile($filename)
    {
      if (!is_file($filename)) return false;
      $bytes = file_get_contents($filename);
      if (is_string($bytes))
      {
        return $bytes . str_repeat(chr(0xFF), 256 - strlen($bytes) % 256);
      }
      return false;
    }

    function LoadSaveFile($filename)
    {
      if (!is_file($filename)) return false;
      $bytes = file_get_contents($filename);
      if (is_string($bytes))
      {
        return $bytes . str_repeat(chr(0xFF), 4096 - strlen($bytes) % 4096);
      }
      return false;
    }

    function PatchMenuButton(&$program)
    {
      global $MenuButtonPatch;
      if (strlen($program) < 256) return false;
      $vector_23 = (ord($program[0x5E]) << 1) + (ord($program[0x5F])  << 9); #ISR timer0 vector addr
      $p = $vector_23;
      $l = 0;
      $lds = 0;
      $branch = 0;
      $timer0_millis = 0 ;
      $timer0_fract  = 0;
      $timer0_overflow_count = 0;
      while ($p < (strlen($program) - 2))
      {
        $p += 2; #handle 2 byte instructions
        $p2  = ord($program[$p-2]);
        $p1  = ord($program[$p-1]);
        if ($p2 == 0x08 && $p1 == 0x95) return false; #ret instruction
        if (($p1 & 0xFC) == 0xF4 && ($p2 & 0x07) == 0x00) # brcc instruction may jump beyond reti
        {
          $branch = (($p1 & 0x03) << 6) + (($p2 & 0xf8) >> 2);
          if ($branch < 128) $branch = $p + $branch;
          else $branch = $p - 256 + $branch;
        }
        if ($p2 == 0x18 && $p1 == 0x95) #reti instruction
        {
          $l = $p - $vector_23;
          if ($p > $branch) break;  # there was no branch beyond reti instruction
        }
        if ($l != 0) #branced beyond reti, look for rjmp instruction
        {
          if (($p1 & 0xF0) == 0xC0)
          {
            $l = $p - $vector_23;
            break;
          }
        }
        #handle 4 byte instructions
        if (($p1 & 0xFE) == 0x90 && ($p2 & 0x0F) == 0x00) # lds instruction
        {
          $lds++;
          if     ($lds == 1) $timer0_millis = ord($program[$p]) | (ord($program[$p+1]) << 8);
          elseif ($lds == 5) $timer0_fract = ord($program[$p]) | (ord($program[$p+1]) << 8);
          elseif ($lds == 6) $timer0_overflow_count = ord($program[$p]) | (ord($program[$p+1]) << 8);
          $p += 2;
        }
        if (($p1 & 0xFE) == 0x92 && ($p2 & 0x0F) == 0x00) # sts instruction
        {
          $p+=2;
        }
      }
      if ($l < strlen($MenuButtonPatch)) return false;
      if ($timer0_millis == 0 || $timer0_fract == 0 || $timer0_overflow_count == 0) return false;
      #patch the new ISR code with 'hold UP + DOWN for 2 seconds to start bootloader menu' feature
      for ($i = 0; $i < strlen($MenuButtonPatch); $i++) $program[$vector_23 + $i] = $MenuButtonPatch[$i];
      #fix timer variables
      $program[$vector_23 + MBP_fract_lds + 0] = chr($timer0_fract & 0xFF);
      $program[$vector_23 + MBP_fract_lds + 1] = chr($timer0_fract >> 8);
      $program[$vector_23 + MBP_fract_sts + 0] = chr($timer0_fract & 0xFF);
      $program[$vector_23 + MBP_fract_sts + 1] = chr($timer0_fract >> 8);
      $program[$vector_23 + MBP_millis_r30 + 0] = chr(0xE0 | (($timer0_millis >> 0) & 0x0F));
      $program[$vector_23 + MBP_millis_r30 + 1] = chr(0xE0 | (($timer0_millis >> 4) & 0x0F));
      $program[$vector_23 + MBP_millis_r31 + 0] = chr(0xF0 | (($timer0_millis >> 8) & 0x0F));
      $program[$vector_23 + MBP_millis_r31 + 1] = chr(0xE0 | (($timer0_millis >>12) & 0x0F));
      $program[$vector_23 + MBP_overflow_r30 +0] = chr(0xE0 | (($timer0_overflow_count >> 0) & 0x0F));
      $program[$vector_23 + MBP_overflow_r30 +1] = chr(0xE0 | (($timer0_overflow_count >> 4) & 0x0F));
      $program[$vector_23 + MBP_overflow_r31 +0] = chr(0xF0 | (($timer0_overflow_count >> 8) & 0x0F));
      $program[$vector_23 + MBP_overflow_r31 +1] = chr(0xE0 | (($timer0_overflow_count >>12) & 0x0F));
      return true;
    }

    function CreateFlashImage($csv)
    {
      {
        $binfile = "";
        $emptypage = str_repeat(chr(0xFF), 128);
        $previouspage = 0xFFFF;
        $currentpage = 0;
        $nextpage = 0;
        $sep = ';';
        $head = current($csv);
        if (substr_count($head, ',') > substr_count($head, ';')) $sep = ',';
        while (next($csv) !== false)
        {
          $row = str_getcsv(current($csv), $sep);
          if (count($row) == 1 && $row[ID_LIST] == "") continue; #ignore blank lines
          while (count($row) < 10) $row[] = "";
          $header = DefaultHeader();
          if ($row[ID_TITLESCREEN] == "")
          {
            BuildFailed('<P>Missing PNG image filename in CSV file at line ' . key($csv) . ' "' . current($csv) . '"</p><p>PNG image files are mandatory.');
          }
          $title = LoadTitleScreenData(FixPath($row[ID_TITLESCREEN]));
          $program = LoadHexFileData(FixPath($row[ID_HEXFILE]));
          $programsize = strlen($program);
          $datafile = LoadDataFile(FixPath($row[ID_DATAFILE]));
          $datasize = strlen($datafile);
          $savefile = LoadSaveFile(FixPath($row[ID_SAVEFILE]));
          $savesize = strlen($savefile);
          $id = hash("sha256" , $program . $datafile, true);
          $programpage = $currentpage + 5;
          $datapage    = $programpage + ($programsize >> 8);
          $alignpage   = $datapage + ($datasize >> 8);
          if ($savesize > 0) $alignsize = (16 - $alignpage % 16) * 256;
          else $alignsize = 0;
          $slotsize = (($programsize + $datasize + $alignsize + $savesize) >> 8) + 5;
          $savepage    = $alignpage + ($alignsize >> 8);
          $nextpage += $slotsize;
          $header[7]  = chr((int)$row[ID_LIST]); #list number
          $header[8]  = chr($previouspage >> 8);
          $header[9]  = chr($previouspage & 0xFF);
          $header[10] = chr($nextpage >> 8);
          $header[11] = chr($nextpage & 0xFF);
          $header[12] = chr($slotsize >> 8);
          $header[13] = chr($slotsize & 0xFF);
          if (substr($program, -128) == $emptypage) $header[14] = chr(($programsize >> 7) - 1); #no need to flash unused 128 byte page
          else $header[14] = chr($programsize >> 7); #program size in 128 byte pages
          if ($programsize > 0)
          {
            $header[15] = chr($programpage >> 8);
            $header[16] = chr($programpage & 0xFF);
            if ($datasize > 0)
            {
              $program[0x14] = chr(0x18);
              $program[0x15] = chr(0x95);
              $program[0x16] = chr($datapage >> 8);
              $program[0x17] = chr($datapage & 0xFF);
              $header[17] = chr($datapage >> 8);
              $header[18] = chr($datapage & 0xFF);
            }
            if ($savesize > 0)
            {
              $program[0x18] = chr(0x18);
              $program[0x19] = chr(0x95);
              $program[0x1a] = chr($savepage >> 8);
              $program[0x1b] = chr($savepage & 0xFF);
              $header[19] = chr($savepage >> 8);
              $header[20] = chr($savepage & 0xFF);
            }
            for ($i = 0; $i < strlen($id); $i++) $header[25 + $i] = $id[$i];
            $stringdata = $row[ID_TITLE] . chr(0) . $row[ID_VERSION] . chr(0) . $row[ID_DEVELOPER] . chr(0) . $row[ID_INFO] . chr(0);
          }
          else
          {
            $stringdata = $row[ID_TITLE] . chr(0) . $row[ID_INFO] . chr(0);
          }
          if (strlen($stringdata) > 199) $stringdata = substr($stringdata,0,199);
          for ($i = 0; $i < strlen($stringdata); $i++) $header[57 + $i] = $stringdata[$i];
          PatchMenuButton($program);
          $binfile .= $header . $title . $program . $datafile . str_repeat(chr(0xFF), $alignsize) . $savefile;
          $previouspage = $currentpage;
          $currentpage = $nextpage;
        }
        $binfile .= str_repeat(chr(0xFF), 256); #use blank header to signal end of FX file system
        $filename = "flashcart-image.bin";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'. $filename .'"');
        header('Content-Length: ' . strlen($binfile));
        echo $binfile;
      }
    }

    // Create a header image with the supplied text ..

    function createHeaderImage($string, $fileName, $fontSize = 15) {

        $img_width = 128;
        $img_height = 64;
        $angle = 0;
        $font = 'Fonts/DeadStock.ttf';

        $img = imagecreatetruecolor($img_width, $img_height);
        $black = imagecolorallocate($img, 0, 0, 0);
        $white = imagecolorallocate($img, 255, 255, 255);

        imagefill($img, 0, 0, $black);

        $tb = imagettfbbox($fontSize, $angle, $font, $string);
        $x = ceil(($img_width - $tb[2]) / 2);
        $y = ceil(($img_height / 2) - ($tb[5] / 2));

        imagettftext($img, $fontSize, $angle, $x, $y, -$white, $font, $string);

        $save = "temp/".strtolower($fileName) .".png";
        imagepng($img, $save);

        return $img;

    }


    // Capture the cart details and stream back as a CSV ..

    if ($_POST["mode"] == "csv") {

        $csv = str_replace("<eol/>", PHP_EOL, $_POST["output"]);

        // Send the headers ..

        $public_name = 'flashcart-custom.csv';
        header("Content-Disposition: attachment; filename=$public_name;");
        header("Content-Type: text/csv");
        header('Content-Length: ' . strlen($csv));

        // Stream the CSV to the client ..

        echo $csv;

    }

    // Create flash image file from CSV data

    if ($_POST["mode"] == "bin") {
        set_time_limit(0);
        $csv = explode("<eol/>", $_POST["output"]);
        CreateFlashImage($csv);
    }


    // Create a header image using the post field 'categroryName' ..

    if ($_POST["mode"] == "createCategory") {

        $img = createHeaderImage($_POST["categoryName"], $_POST["guid"]);

    }

?>
