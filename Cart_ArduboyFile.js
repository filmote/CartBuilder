(() => {

const arduboyFileButton = document.getElementById("arduboyFileButton");
const arduboyFileInput  = document.getElementById("arduboyFileInput");

const gameTitle         = document.getElementById("gameTitle");
const versionNumber     = document.getElementById("versionNumber");
const developerName     = document.getElementById("developerName");
const description       = document.getElementById("description");

const hexName           = document.getElementById("hexName");
const graphicName       = document.getElementById("graphicName");
const dataName          = document.getElementById("dataName");
const saveName          = document.getElementById("saveName");

let arduboyFile;

arduboyFileInput.onchange = on_arduboyFileChange;
arduboyFileButton.onclick = () => arduboyFileInput.dispatchEvent(new MouseEvent("click"));

async function on_arduboyFileChange() {
    try {
        arduboyFileButton.disabled = true;
        arduboyFile = arduboyFileInput.files[0];
        await loadFiles();
    } catch (error) {
        alert(error);
    } finally {
        arduboyFileButton.disabled = false;
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
    console.log(entries);
    const entryInfo = entries.find(x => x.filename == "info.json");
    if(entryInfo === undefined) throw "info.json not found";
    const info = JSON.parse(await getEntryData(entryInfo));
    console.log(info);
    if('title'       in info) gameTitle    .value = info.title;
    if('version'     in info) versionNumber.value = info.version;
    if('author'      in info) developerName.value = info.author;
    if('description' in info) description  .value = info.description;
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
    }
    if('screenshots' in info && info.screenshots.length > 0 && 'filename' in info.screenshots[0]) {
        const entryGraphic = entries.find(x => x.filename == info.screenshots[0].filename);
        if(entryGraphic !== undefined)
            graphicName.files = await createFiles(entryGraphic, info.screenshots[0].filename);
    }
}

})();
