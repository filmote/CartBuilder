//V2.26

// -- debug helper

function debug(variableObject) {
    for (let name in variableObject) {
        console.log(`${name}: `, variableObject[name]);
    }
}

// --- DOM Element object definitions ---

const progressPercent = document.getElementById('progressPercent');
const progressTime = document.getElementById('progressTime');
const progressBar = document.getElementById('progressBar');
const fileInput = document.getElementById('fileInput');
const fileButton = document.getElementById('fileButton');
const fileName = document.getElementById('fileName');
const uploadBtn = document.getElementById('uploadBtn');

uploadBtn.addEventListener('click', handleSubmit, false);
	
// --- Progress Bar Animation ---
// Library calls: drawInit(), drawComplete() and drawPercentage(percentVal)

function drawInit(){
	uploadBtn.style.display = "none";
}

function drawComplete(){
	uploadBtn.style.display = "block";
}

let currentAnimation = null;
let lastEndValue = 0; // Cache the last end value
let lastCallTime = 0; // Timestamp of the last function call
let currentValue = 0; // Current progress value
let progressHistory = []; // Stores history of progress values and timestamps

function drawPercentage(percentVal) {
	let now = Date.now();
	let timeElapsed = now - lastCallTime; // Time since last call
	lastCallTime = now; // Update the timestamp

	let endValue = Math.round(percentVal);
	
	if(percentVal>5){
		// the beginning is slow and unfairly weights the average
		progressHistory.push({
			time: now,
			value: endValue
		});
	}
	let estimatedTimeToComplete = Math.round(estimateTimeToComplete());

	if (percentVal > 0) {
		progressPercent.textContent = endValue + '%';
		//console.log("Estimated Time to Complete: ", estimatedTimeToComplete, "seconds");
		if (estimatedTimeToComplete == 0) {
			if (percentVal == 100) {
				progressTime.textContent = "Complete!";
			} else {
				progressTime.textContent = "Calculating...";
			}

		}		
		else if(estimatedTimeToComplete > 60){
			   const minutes = Math.floor(estimatedTimeToComplete / 60);
			const seconds = estimatedTimeToComplete % 60;
			let minWord = "minute";
			if(minutes>1) minWord += "s";
			let secWord = "second";
			if(seconds>1) secWord += "s";
			progressTime.innerHTML = minutes + " " + minWord + "<br>" + seconds + " " + secWord + " left";
		}
		else {
			progressTime.textContent = estimatedTimeToComplete + " seconds left";
		}

	}

	let progressColor = progressBar.getAttribute("data-progress-color");

	// Adjust animation speed based on new endValue
	let frameRate = calculateFrameRate(timeElapsed, endValue);

	if (currentAnimation !== null) {
		cancelAnimationFrame(currentAnimation);
	}

	function animate(step) {
		if (currentValue > endValue) {
			currentValue = currentValue - step;
		} else {
			currentValue = Math.min(currentValue + step, endValue);
		}

		progressBar.style.background = 'conic-gradient('+progressColor+' '+currentValue * 3.6+'deg, '+ progressBar.getAttribute("data-bg-color")+' 0deg)';

		if (currentValue + endValue == 0) {
			progressBar.style.background = '';
			progressHistory = [];
		}

		currentAnimation = requestAnimationFrame(() => animate(frameRate));
	}

	animate(frameRate);
}

function calculateFrameRate(timeElapsed, endValue) {
	let baseFrameRate = 0.02;
	let expectedDuration = 500; // Adjust as needed

	if (endValue === 0) {
		progressTime.textContent = '';
		progressPercent.textContent = '';

		return 5; // Faster frame rate for resetting
	} else if (timeElapsed > 0) {
		let dynamicRate = baseFrameRate * (expectedDuration / timeElapsed);
		return dynamicRate * (endValue - currentValue);
	} else {
		return baseFrameRate;
	}
}


let counter = 0;
let lastComputedEstimate = 0;
let lastComputedTime = 0;

function estimateTimeToComplete() {
    counter++;

    if (counter % 10 === 0) {
        // Compute the estimate every 10th call
        lastComputedEstimate = computeEstimate();
        lastComputedTime = Date.now();
        return lastComputedEstimate;
    } else {
        // For other calls, adjust the estimate based on time elapsed
        const currentTime = Date.now();
        const timeElapsed = currentTime - lastComputedTime;

        // Adjust the estimate based on the elapsed time
        const adjustedEstimate = Math.max(0, lastComputedEstimate - timeElapsed / 1000);
        return adjustedEstimate.toFixed(2);
    }
}

function computeEstimate() {
    if (progressHistory.length < 5) {
        return 0; // Not enough data to calculate
    }

    // Calculate average speed (percent change per millisecond)
    let totalChange = 0;
    let totalTime = 0;
    for (let i = 1; i < progressHistory.length; i++) {
        let change = progressHistory[i].value - progressHistory[i - 1].value;
        let time = progressHistory[i].time - progressHistory[i - 1].time;
        totalChange += change;
        totalTime += time;
    }
    let averageSpeed = totalChange / totalTime;

    if (averageSpeed === 0) {
        return "Infinity"; // No progress being made
    }

    let remaining = 100 - progressHistory[progressHistory.length - 1].value;
    let estimatedTimeMillis = remaining / averageSpeed;

    return (estimatedTimeMillis / 1000).toFixed(2); // Convert to seconds
}


// --- End of DOM Manipulation ---


// --- Library Interface ---


function padToMultiple(data, multiple) {
    const remainder = data.length % multiple;
    if (remainder === 0) return data; // Already a multiple, no padding needed

    const paddingLength = multiple - remainder;
    const padding = new Uint8Array(paddingLength).fill(0xFF); // Create padding with 0xFF
    return Uint8Array.from([...data, ...padding]); // Combine data and padding
}

function padDataToBlockSize(data, blockSize) {
    const dataSize = data.length;
    const remainder = dataSize % blockSize;
    const paddingSize = remainder === 0 ? 0 : blockSize - remainder;
    const paddedData = new Uint8Array(paddingSize + dataSize).fill(0xFF);

    paddedData.set(data, paddingSize); // Copy original data to the end of the new array
    return paddedData;
}


async function handleReset() {
	if (!("serial" in navigator)) {
		alert("Please use Chromium based browsers!");
	}
	port = await navigator.serial.requestPort({
		filters
	});
	await port.open({
		baudRate: 1200
	});
	await waitforme(500);
	await port.close();
	await waitforme(500);
}


async function handleSubmit(e) {

    if (!("serial" in navigator)) {
        alert("Please use Chromium based browsers!");
        return;
    }

    let fileType = 0;
    let fileContents;

    let file = new Blob();
    let flashFileData = new Blob();
    let saveFileData = new Blob();
    let qualFileName = $('#fileName').text();
    let qualDateFileName = $('#dataFileName').val();
    let qualSaveFileName = $('#saveFileName').val();
    let hasDateFile = $('#hasDataFile').val();
    let hasSaveFile = $('#hasSaveFile').val();
    const readerF = new FileReader();
    const readerD = new FileReader();


    // If the cart has been generated then immedaitely flash it.

    if (qualFileName == "Unique Cart") {
        await flashFx(flashCartFile);
        handleReset();
        return;
    }


    // Otherwise, flash the game that has been selected ..
    
    const response = await fetch(qualFileName);
    if (!response.ok) {
        alert("Error loading default file");
        return;
    }

    const name = qualFileName;
    const lastDot = name.lastIndexOf('.');
    const fileName = name.substring(0, lastDot);
    const ext = name.substring(lastDot + 1);

    if (hasDateFile == "N" && hasSaveFile == "N") {
        console.log("standalone hex file detected");
        fileType = 1;
    } else if (hasDateFile == "Y" || hasSaveFile == "Y") {
        console.log("FX files detected");
        fileType = 3;
    } else {
        alert("Only .hex .bin and .arduboy files are supported");
    }


    console.log("awaiting blob");
    file = await response.blob();
    console.log("blobbed");

    
    readerF.onload = async function (event) {

        fileContents = event.target.result;

        if (fileType == 1) {
            flashHex(fileContents);
        } else if (fileType == 2) {

            const uint8ArrayData = new Uint8Array(fileContents);
            flashFx(uint8ArrayData);
        }

    };

    readerD.onload = async function (event) {

        hexFileData = event.target.result;

    };

    if (fileType == 1) {
        readerF.readAsText(file);
    } else if (fileType == 3) {

        let devData;


        // Read this way so that the result is in the correct format ':001122 ..'

        readerD.readAsText(file);


        // Does a data file exit?

        if (hasDateFile == "Y") {

            const requestDataFile = async () => {
                const response = await fetch(qualDateFileName);
                const arrayBuffer = await response.arrayBuffer();
                flashFileData = new Uint8Array(arrayBuffer);
            }

            await requestDataFile();
            flashFileData = padToMultiple(flashFileData, 256); //FX_PAGESIZE
            devData = flashFileData;

        }


        // Does a save file exist?

        if (hasSaveFile == "Y") {

            const requestSaveFile = async () => {
                const response = await fetch(qualSaveFileName);
                const arrayBuffer = await response.arrayBuffer();
                saveFileData = new Uint8Array(arrayBuffer);
            }

            await requestSaveFile();
            saveFileData = padToMultiple(saveFileData, 4096);

            if (flashFileData) {
                devData = new Uint8Array([ ...flashFileData, ...saveFileData ]);
            } else {
                console.log("Save File found, but no Data File. Aborting!");
                return;
            }
        }

        const paddedData = padDataToBlockSize(devData, FX_BLOCKSIZE);

        await flashArduboy(hexFileData, paddedData);


    }

}
// --- End Library Interface ---


// --- Begin Library Functions ---


// --- Hex Parser --- 


// based on code by benjamin naigener https://github.com/benjaminaigner/avr109-webserial
//credits: https://stackoverflow.com/questions/38987784/how-to-convert-a-hexadecimal-string-to-uint8array-and-back-in-javascript
const fromHexString = hexString =>
	new Uint8Array(hexString.match(/.{1,2}/g).map(byte => parseInt(byte, 16)));

//Intel Hex record types
const DATA = 0,
END_OF_FILE = 1,
EXT_SEGMENT_ADDR = 2,
START_SEGMENT_ADDR = 3,
EXT_LINEAR_ADDR = 4,
START_LINEAR_ADDR = 5;

const EMPTY_VALUE = 0xFF;

/* intel_hex.parse(data)
`data` - Intel Hex file (string in ASCII format or Buffer Object)
`bufferSize` - the size of the Buffer containing the data (optional)

returns an Object with the following properties:
- data - data as a Buffer Object, padded with 0xFF
where data is empty.
- startSegmentAddress - the address provided by the last
start segment address record; null, if not given
- startLinearAddress - the address provided by the last
start linear address record; null, if not given
Special thanks to: http://en.wikipedia.org/wiki/Intel_HEX
 */
	 
function parseIntelHex(data) {
	//if(data instanceof Buffer)
	data = data.toString("ascii");
	//Initialization
	var buf = new Uint8Array(32768); //max. words in mega32u4
	var bufLength = 0, //Length of data in the buffer
	highAddress = 0, //upper address
	startSegmentAddress = null,
	startLinearAddress = null,
	lineNum = 0, //Line number in the Intel Hex string
	pos = 0; //Current position in the Intel Hex string
	const SMALLEST_LINE = 11;
	while (pos + SMALLEST_LINE <= data.length) {
		//Parse an entire line
		if (data.charAt(pos++) != ":")
			throw new Error("Line " + (lineNum + 1) +
				" does not start with a colon (:).");
		else
			lineNum++;
		//Number of bytes (hex digit pairs) in the data field
		var dataLength = parseInt(data.substr(pos, 2), 16);
		pos += 2;
		//Get 16-bit address (big-endian)
		var lowAddress = parseInt(data.substr(pos, 4), 16);
		pos += 4;
		//Record type
		var recordType = parseInt(data.substr(pos, 2), 16);
		pos += 2;
		//Data field (hex-encoded string)
		var dataField = data.substr(pos, dataLength * 2);
		if (dataLength)
			var dataFieldBuf = fromHexString(dataField);
		else
			var dataFieldBuf = new Uint8Array();
		pos += dataLength * 2;
		//Checksum
		var checksum = parseInt(data.substr(pos, 2), 16);
		pos += 2;
		//Validate checksum
		var calcChecksum = (dataLength + (lowAddress >> 8) +
			lowAddress + recordType) & 0xFF;
		for (var i = 0; i < dataLength; i++)
			calcChecksum = (calcChecksum + dataFieldBuf[i]) & 0xFF;
		calcChecksum = (0x100 - calcChecksum) & 0xFF;
		if (checksum != calcChecksum)
			throw new Error("Invalid checksum on line " + lineNum +
				": got " + checksum + ", but expected " + calcChecksum);
		//Parse the record based on its recordType
		switch (recordType) {
		case DATA:
			var absoluteAddress = highAddress + lowAddress;
			//Expand buf, if necessary
			/*if(absoluteAddress + dataLength >= buf.length)
		{
			var tmp = Buffer.alloc((absoluteAddress + dataLength) * 2);
			buf.copy(tmp, 0, 0, bufLength);
			buf = tmp;
			}*/
			//Write over skipped bytes with EMPTY_VALUE
			if (absoluteAddress > bufLength)
				buf.fill(EMPTY_VALUE, bufLength, absoluteAddress);
			//Write the dataFieldBuf to buf
			//dataFieldBuf.copy(buf, absoluteAddress);
			dataFieldBuf.forEach(function (val, index) {
				buf[absoluteAddress + index] = val;
			});
			bufLength = Math.max(bufLength, absoluteAddress + dataLength);
			break;
		case END_OF_FILE:
			if (dataLength != 0)
				throw new Error("Invalid EOF record on line " +
					lineNum + ".");
			return {
				"data": buf.slice(0, bufLength),
				"startSegmentAddress": startSegmentAddress,
				"startLinearAddress": startLinearAddress
			};
			break;
		case EXT_SEGMENT_ADDR:
			if (dataLength != 2 || lowAddress != 0)
				throw new Error("Invalid extended segment address record on line " +
					lineNum + ".");
			highAddress = parseInt(dataField, 16) << 4;
			break;
		case START_SEGMENT_ADDR:
			if (dataLength != 4 || lowAddress != 0)
				throw new Error("Invalid start segment address record on line " +
					lineNum + ".");
			startSegmentAddress = parseInt(dataField, 16);
			break;
		case EXT_LINEAR_ADDR:
			if (dataLength != 2 || lowAddress != 0)
				throw new Error("Invalid extended linear address record on line " +
					lineNum + ".");
			highAddress = parseInt(dataField, 16) << 16;
			break;
		case START_LINEAR_ADDR:
			if (dataLength != 4 || lowAddress != 0)
				throw new Error("Invalid start linear address record on line " +
					lineNum + ".");
			startLinearAddress = parseInt(dataField, 16);
			break;
		default:
			throw new Error("Invalid record type (" + recordType +
				") on line " + lineNum);
			break;
		}
		//Advance to the next line
		if (data.charAt(pos) == "\r")
			pos++;
		if (data.charAt(pos) == "\n")
			pos++;
	}
	throw new Error("Unexpected end of input: missing or invalid EOF record.");
};


// --- Helper Functions ---

function waitforme(milisec) {
	return new Promise(resolve => {
		setTimeout(() => {
			resolve('')
		}, milisec);
	})
}


const equals = (a, b) =>
a.length === b.length &&
a.every((v, i) => v === b[i]);


// --- Web Serial API Calls after this point ---



let filters = [{ // Port filters for Arduino Leonardo in Bootloader and Application Mode
		usbVendorId: 0x2341,
		usbProductId: 0x0036
	}, {
		usbVendorId: 0x2341,
		usbProductId: 0x8036
	}
];
	
/*	
async function handleReset(e) {
    alert("Please use Chromium based browsers!");
	if (!("serial" in navigator)) {
		alert("Please use Chromium based browsers!");
	}
	port = await navigator.serial.requestPort({
		filters
	});
	await port.open({
		baudRate: 1200
	});
	await waitforme(500);
	await port.close();
	await waitforme(500);
}
*/
class SerialPortManager {
    constructor() {
        this.port = null;
        this.writer = null;
        this.reader = null;
    }

	async initPort() {
		this.port = await navigator.serial.requestPort({ filters });
		await this.port.open({ baudRate: 115200, bufferSize: 65536 });
		this.writer = this.port.writable.getWriter();
		this.reader = this.port.readable.getReader();
	}
	
	async writeAndRead(data) {
		await this.writer.write(data);
		const { value } = await this.reader.read(1);
		return value;
	}

    async cleanup() {
        if (this.reader) {
            try {
                this.reader.releaseLock();
            } catch (error) {
                console.error("Error releasing reader lock:", error);
            }
        }

        if (this.writer) {
            try {
                this.writer.releaseLock();
            } catch (error) {
                console.error("Error releasing writer lock:", error);
            }
        }

        if (this.port) {
            try {
                await this.port.close();
            } catch (error) {
                console.error("Error closing the port:", error);
            }
        }
    }
}


async function beginProgramming(serialManager) {
    await serialManager.writer.write(new Uint8Array([0x53])); //trigger update by sending programmer ID command
    await waitforme(500);
    // TODO -- should be doing a read and verifying it returns "ARDUBOY"
    await serialManager.writer.write(new Uint8Array([120, 0xC2])); // red led and disable buttons
    drawPercentage(0);
		drawInit();
}


async function endProgramming(serialManager) {
    await serialManager.writer.write(new Uint8Array([120, 0x40])); // red led off and enable buttons
    drawPercentage(100);
    setTimeout(function () {
        drawComplete();
        drawPercentage(0);
    }, 5000);
}

const HEADER_START_STRING = "ARDUBOY";
const HEADER_START_BYTES = new TextEncoder().encode(HEADER_START_STRING);
const HEADER_LENGTH = 256;
const SLOT_SIZE_HEADER_INDEX = 12;

const FX_PAGESIZE = 256;
const FX_BLOCKSIZE = 65536;
const FX_PAGES_PER_BLOCK = FX_BLOCKSIZE / FX_PAGESIZE;

const FX_FULLCART_SIZE = 16777216;
const FX_BLOCKS_PER_FULLCART = FX_FULLCART_SIZE / FX_BLOCKSIZE;


async function flashBlock(serialManager, writeBlock, flashData, readBlock) {

    if (readBlock === undefined || readBlock === null) {
        readBlock = writeBlock;
    }

    let blockAddr = writeBlock * FX_BLOCKSIZE / FX_PAGESIZE;
    let readOffset = readBlock * FX_BLOCKSIZE;

    const addrCommand = new Uint8Array(['A'.charCodeAt(0), blockAddr >> 8, blockAddr & 0xFF]);

    await serialManager.writeAndRead(addrCommand); // address command

    let dataSlice = flashData.slice(readOffset, readOffset + FX_BLOCKSIZE);
    let realBlockLen = dataSlice.length;

    await serialManager.writer.write(new Uint8Array(['B'.charCodeAt(0), realBlockLen >> 8, realBlockLen & 0xFF, 'C'.charCodeAt(0)])); // data command
    await serialManager.writer.write(dataSlice); // data write
    await serialManager.reader.read(1);
}


async function flashFx(flashData, pageNumber = 0, verify = false) {
    if (!flashData.length) {
        throw new Error("No flash data provided!");
    }

    const serial1 = new SerialPortManager();
    await serial1.initPort();
    await beginProgramming(serial1);

    let blocks = Math.ceil(flashData.length / FX_BLOCKSIZE);
    console.log('Flashing ${blocks} blocks to FX');

    for (let block = 0; block < blocks; block++) {
			drawPercentage((block / blocks) * 100);
        await flashBlock(serial1, block, flashData);

        if (verify) {
            // TODO -- TEST and get working --- UNTESTED
            await serial1.writeAndRead(new Uint8Array(['A'.charCodeAt(0), blockAddr >> 8, blockAddr & 0xFF])); 
            await serial1.writeAndRead(new Uint8Array(['g'.charCodeAt(0), blockLen >> 8, blockLen & 0xFF, 'C'.charCodeAt(0)]));
            const verifyData = await serial1.reader.read(blockLen);
            if (!equals(verifyData, flashData.slice(block * FX_BLOCKSIZE, block * FX_BLOCKSIZE + blockLen))) {
                throw new Error('FX verify failed at address ${blockAddr.toString(16)}. Upload unsuccessful.');
            }
        }

    }

    await endProgramming(serial1);
    await serial1.cleanup();

    console.log("Success in flashing FX!!");

}


async function leaveBootloader(serialManager) {
    await serialManager.writer.write(new Uint8Array([0x4C])); //"L" -> leave programming mode
    await serialManager.writer.write(new Uint8Array([120, 0x40])); // red led off and enable buttons
    await waitforme(5);
    await serialManager.writer.write(new Uint8Array([0x45])); //"E" -> exit bootloader
}


function flashHexPage(flashData, pageStart) {
    let data, pad, txx;

    // Check if this is the last page (possibly incomplete -> fill with 0xFF)
    if (pageStart + 128 > flashData.data.length) {
        data = flashData.data.slice(pageStart); // Take the remaining bit
        pad = new Uint8Array(128 - data.length); // Create a new padding array
        pad.fill(0xFF);
        txx = Uint8Array.from([ ...data, ...pad]); // Concat command, remaining data, and padding
        console.log("last page");
    } else {
        data = flashData.data.slice(pageStart, pageStart + 128); // Take subarray with 128B
        txx = Uint8Array.from([ ...data]); // Concatenate command with page data
    }

    return txx;
}	

async function flashHex(hexData) {
    if (!hexData.length) {
        throw new Error("No hex data provided!");
    }
    let pageStart = 0;
    let address = 0;

    let flashData = parseIntelHex(hexData);

    const serial1 = new SerialPortManager();
    await serial1.initPort();
    await beginProgramming(serial1);

    do {
        drawPercentage((pageStart / flashData.data.length) * 100);

        await serial1.writeAndRead(new Uint8Array([0x41, (address >> 8) & 0xFF, address & 0xFF])); //addresss command
        let txx = flashHexPage(flashData, pageStart); //generate  page data
        cmd = new Uint8Array([0x42, 0x00, 0x80, 0x46]); //flash page write command ('B' + 2bytes size + 'F')

        await serial1.writer.write(cmd);
        await serial1.writeAndRead(txx); //write the page data

        pageStart += 128;
        address += 64;
    } while (pageStart < flashData.data.length);

    await waitforme(500);
    await leaveBootloader(serial1);
    await endProgramming(serial1);

    await serial1.cleanup();

    console.log("Success in writing Arduboy Hex!");

}


// Function to check if the data at the given index is an FX slot
function isSlot(fullData, index) {

    return HEADER_START_BYTES.every((byte, offset) => {
        const fullDataByte = fullData[index + offset];
        //console.log(`Comparing: HEADER_START_BYTES[${offset}] = ${byte}, fullData[${index + offset}] = ${fullDataByte}`);
        return byte === fullDataByte;
    });
}

// Function to get a 2-byte value from the data (big endian)
function get2ByteValue(fullData, index) {
    return new DataView(fullData.buffer).getUint16(index, false); // false for big-endian
}

// Function to get the size in bytes of the FX slot
function getSlotSizeBytes(fullData, index) {
    return get2ByteValue(fullData, index + SLOT_SIZE_HEADER_INDEX) * FX_PAGESIZE;
}


async function readAndCombineData(serialManager, readLen) {
    let combinedData = new Uint8Array(0);

    while (true) {
        const readResult = await serialManager.reader.read(readLen);
        if (readResult.done) {
            // Handle the end of the stream if necessary.
            break;
        }

        const newData = readResult.value;
		
        // Combine the new data with the previously received data
        let temp = new Uint8Array(combinedData.length + newData.length);
        temp.set(combinedData, 0);
        temp.set(newData, combinedData.length);
        combinedData = temp;

        // Check the first character of the combined data
        if (combinedData.length >= readLen) {
            break; // Exit loop if the condition is met
        }
    }

    return combinedData;

}


async function endOfCart(serialManager) {
	let slots = 0;
	let headerAddr = 0;
	
    while (true) {

        const blockAddr = headerAddr / FX_PAGESIZE;
        const readLen = HEADER_LENGTH;
        await serialManager.writeAndRead(new Uint8Array([ord("A"), blockAddr >> 8, blockAddr & 0xFF]));
        await serialManager.writer.write(new Uint8Array([ord("g"), (readLen >> 8) & 0xFF, readLen & 0xFF, ord("C")]));

		const header = await readAndCombineData(serialManager, readLen);

        if (!isSlot(header, 0)) {
            break;
        }

        slots++;
        headerAddr += getSlotSizeBytes(header, 0);
    }
    
    return headerAddr; // Return the final headerAddr value
}

// Utility function to convert a character to its ASCII code
function ord(str) {
    return str.charCodeAt(0);
}


async function flashArduboy(hexFileData, devData) {

    if (!hexFileData.length) {
        throw new Error("No hex data provided!");
    }
    if (!devData.length) {
        throw new Error("No flash data provided!");
    }

    const hexFileBlocks = hexFileData.length / FX_BLOCKSIZE; 
    const devDataBlocks = devData.length / FX_BLOCKSIZE;
    blocks = hexFileBlocks + devDataBlocks;
    blockCount = 0;

    console.log("devDataBlocks: ", devDataBlocks);
	
    let parsedHexData = parseIntelHex(hexFileData);

    const serial1 = new SerialPortManager();
    await serial1.initPort();

    const headerAddr = await endOfCart(serial1);
    const lastBlock = Math.floor(headerAddr / FX_BLOCKSIZE);


    if (lastBlock + devDataBlocks < FX_BLOCKS_PER_FULLCART) {
        console.log("Dev Data Free Alloc Success!");
        blockStartAddr = FX_BLOCKS_PER_FULLCART - devDataBlocks;

        await beginProgramming(serial1);

        let readBlock = 0;
        // flash external memory
        for (let block = blockStartAddr; block < FX_BLOCKS_PER_FULLCART; block++) {
            drawPercentage((blockCount / blocks) * 100);
            await flashBlock(serial1, block, devData, readBlock);
            readBlock++;
            blockCount++;
			console.log(blockCount);
        }

        await waitforme(500);

        console.log("Attempting to flash hex");
        let pageStart = 0;
        let address = 0;
        // flash hex
        do {
            drawPercentage((blockCount / blocks) * 100);
            await serial1.writeAndRead(new Uint8Array([0x41, (address >> 8) & 0xFF, address & 0xFF])); //addresss command
            let txx = flashHexPage(parsedHexData, pageStart); //generate  page data
            cmd = new Uint8Array([0x42, 0x00, 0x80, 0x46]); //flash page write command ('B' + 2bytes size + 'F')

            await serial1.writer.write(cmd);
            await serial1.writeAndRead(txx); //write the page data

            pageStart += 128;
            address += 64;
            blockCount = blockCount + (128 / FX_BLOCKSIZE);
			console.log(blockCount);
        } while (pageStart < parsedHexData.data.length);
        console.log("Finished!");
        await leaveBootloader(serial1);

        await endProgramming(serial1);

    } else {
        alert("Not enough free memory.");
        throw new Error("Dev Data Free Alloc Fail!");
    }

    await serial1.cleanup();

    console.log("Success in flashing Arduboy File!!");

}

