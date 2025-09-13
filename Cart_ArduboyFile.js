/* -------------------------------------------------------------------------------

BSD 3-Clause License

Copyright (c) 2019, Filmote, Mr.Blinky and Brow1067
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

// V2.52
(() => {

//const arduboyFileButton = document.getElementById("arduboyFileButton");
const arduboyFileInput  = document.getElementById("arduboyFileInput");

const gameTitle         = document.getElementById("gameTitle");
const versionNumber     = document.getElementById("versionNumber");
const developerName     = document.getElementById("developerName");
const description       = document.getElementById("description");
const sourceURL         = document.getElementById("sourceURL");
const websiteURL        = document.getElementById("websiteURL");

const hexName           = document.getElementById("hexName");
const graphicName       = document.getElementById("graphicName");
const dataName          = document.getElementById("dataName");
const saveName          = document.getElementById("saveName");

const start             = document.getElementById("start");
const end               = document.getElementById("end");
const hash              = document.getElementById("hash");

let arduboyFile;

arduboyFileInput.onchange = on_arduboyFileChange;
//arduboyFileButton.onclick = () => arduboyFileInput.dispatchEvent(new MouseEvent("click"));

async function on_arduboyFileChange() {
    try {
        //arduboyFileButton.disabled = true;
        arduboyFile = arduboyFileInput.files[0];
        await loadFiles();
    } catch (error) {
        alert(error);
    } finally {
        //arduboyFileButton.disabled = false;
        arduboyFileInput.value = "";
    }
}

async function getEntryData(entry) {
    return (await entry.getData(new zip.BlobWriter(), {})).text();
}

async function createFiles(entry, path) {
    const filename = path.split('/').pop();
    const blob = await entry.getData(new zip.BlobWriter(), {});
    let file = new File([blob], filename);
    let container = new DataTransfer();
    container.items.add(file);
    return container.files;
}

async function loadFiles() {
    const entries = await (new zip.ZipReader(new zip.BlobReader(arduboyFile))).getEntries("utf-8");
    const entryInfo = entries.find(x => x.filename == "info.json");
    if(entryInfo === undefined) throw "info.json not found";
    const info = JSON.parse(await getEntryData(entryInfo));
    if('title'       in info) gameTitle    .value = info.title;
    if('version'     in info) versionNumber.value = info.version;
    if('author'      in info) developerName.value = info.author;
    if('description' in info) description  .value = info.description;
    if('sourceUrl'   in info) sourceURL    .value = info.sourceUrl;
    if('url'         in info) websiteURL   .value = info.url;

    if('start'       in info) start        .value = info.start;
    if('end'         in info) end          .value = info.end;
    if('hash'        in info) hash         .value = info.hash;

    if('binaries' in info && info.binaries.length > 0) {
        if('filename' in info.binaries[0]) {
            const entryHex = entries.find(x => x.filename == info.binaries[0].filename);
            if(entryHex !== undefined)
                hexName.files = await createFiles(entryHex, info.binaries[0].filename);
        }
        if('flashdata' in info.binaries[0]) {
            const entryData = entries.find(x => x.filename == info.binaries[0].flashdata);
            if(entryData !== undefined)
                dataName.files = await createFiles(entryData, info.binaries[0].flashdata);
        }
        if('flashsave' in info.binaries[0]) {
            const entrySave = entries.find(x => x.filename == info.binaries[0].flashsave);
            if(entrySave !== undefined)
                saveName.files = await createFiles(entrySave, info.binaries[0].flashsave);
        }
        if('cartimage' in info.binaries[0]) {
            const entryCartImage = entries.find(x => x.filename == info.binaries[0].cartimage);
            if(entryCartImage !== undefined)
                graphicName.files = await createFiles(entryCartImage, info.binaries[0].cartimage);
        }
    }
    if('screenshots' in info && info.screenshots.length > 0 && 'filename' in info.screenshots[0]) {
        const entryGraphic = entries.find(x => x.filename == info.screenshots[0].filename);
        if(entryGraphic !== undefined)
            graphicName.files = await createFiles(entryGraphic, info.screenshots[0].filename);
    }
}

})();
