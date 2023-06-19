import axios from "axios";

let baseUrl = import.meta.env.VITE_BASE_API_URL
if (import.meta.env.PROD)
{
    //production mode
    //baseUrl = ""
}

const service = axios.create({
    baseURL: baseUrl,
    timeout: 50000, // Request timeout
});

// Request intercepter
service.interceptors.request.use(
    config => {
        // const token = isLogged();
        // if (token) {
        //   config.headers['Authorization'] = 'Bearer ' + isLogged(); // Set JWT token
        // }

        return config;
    },
    error => {
        console.log(error); // for debug
        Promise.reject(error);
    }
);

service.interceptors.response.use(
    response => {
        return response.data;
    },
    error => {
        //console.log("error request", error)
        return Promise.reject(error);
    }
);

console.log('full uri', service.getUri())

export default service;
