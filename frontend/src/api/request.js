import axios from "axios";
import { useUserSession } from '../store/auth-store'

const userSession = useUserSession()
let baseUrl = import.meta.env.VITE_BASE_API_URL

if (import.meta.env.PROD)
{
    //production mode
    //baseUrl = ""
}

const moreOptions = userSession ?
    {
    userId: userSession.user.id
    } :
    {}

const service = axios.create({
    baseURL: baseUrl,
    timeout: 50000, // Request timeou
    headers: {
        ...moreOptions
    }
});

// Request intercepter
service.interceptors.request.use(
    config => {
        // const token = isLogged();
        // if (token) {
        //   config.headers['Authorization'] = 'Bearer ' + isLogged(); // Set JWT token
        // }
        
        if (userSession)
        {
            if (config.data)
            {
                config.data['userId'] = userSession.user.id        
            }
        }

        //console.log('axios config', config)
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

export default service;
