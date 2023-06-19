import request from "./request"

class Resource{ 
    constructor(uri) {
        this.version = '' // versioning such as v1, v2 etc
        this.uri = this.version + '/' + uri;
    }

    get(path = '') {
        const finalPath = path ? '/' + path : ''
        const finalUrl = this.uri ?  this.uri + finalPath : ''
        
        return request({
            url: finalUrl,
            method: 'get',
        });
    }

    store(resource, path = '') {
        const finalPath = path ? '/' + path : ''
        const finalUrl = this.uri ? this.uri + finalPath : ''

        return request({
            url: finalUrl,
            method: 'post',
            data: resource,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                "Content-Type": "application/json",
            }
        });
    }

    update(id, resource) {
        return request({
            url: '/' + this.uri + '/' + id,
            method: 'put',
            data: resource,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                "Content-Type": "application/json",
            }
        });
    }

    destroy(id) {
        return request({
            url: '/' + this.uri + '/' + id,
            method: 'delete',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                "Content-Type": "application/json",
            }
        });
    }
}

export { Resource as default };
