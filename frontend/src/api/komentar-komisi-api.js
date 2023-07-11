import Resource from "./resource"

const resource = new Resource('komentar-komisi')

export function listKomentarRequest(page) {
    const result = resource.get({
        page: parseInt(page)
    });

    return result
}

export function insertKomentarRequest(data) {
    return resource.store(data, 'save', true);
}

export function deleteKomentarRequest(komentarId) {
    return resource.destroy('delete', komentarId)
}