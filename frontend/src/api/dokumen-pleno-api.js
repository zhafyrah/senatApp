import Resource from "./resource"

const resource = new Resource('dokumen-pleno')

export function listDokPlenoRequest(page) {
    const result = resource.get({
        page: parseInt(page)
    });

    return result
}

export function getById(id) {
    return resource.get({}, id)
}

export function insertDokPlenoRequest(data) {
    return resource.store(data, 'save', true);
}

export function updateDokPlenoRequest(beritaId, data) {
    return resource.update(beritaId, data, 'update', true)
}

export function deleteDokPlenoRequest(beritaId) {
    return resource.destroy('delete', beritaId)
}