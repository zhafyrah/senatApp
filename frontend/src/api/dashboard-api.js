import Resource from "./resource"

const resource = new Resource('dashboard')

export function getDashboardRequest() {
    return resource.get()
}