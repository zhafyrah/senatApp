import { defineStore } from 'pinia'
import { loginRequest } from "../api/auth-api"
import { useLoading } from 'vue3-loading-overlay';  

const loadingOverlay = useLoading()

export const useAuthStore = defineStore('auth', {
    state: () => ({
        isError: false,
        isSuccess: false,
        responseMessage: ""
    }),
    actions: {
        submitLogin(email, password, remember) {
            //reset state
            this.isError = false
            this.responseMessage = ""

            loadingOverlay.show({
                color: "#0069d9",
                blur: "5px"
            })

            loginRequest(email, password)
                .then((response) => {
                    
                    if (remember)
                    {
                        localStorage.setItem("remember", {
                            email: email,
                            password: password,
                        })
                    } else
                    {
                        localStorage.setItem("remember", null)
                    }

                    saveUserSession(response.data)
                    this.isSuccess = true
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response)
                    {
                        this.responseMessage = error.response.data.message
                    } else if (error.request)
                    {
                        this.responseMessage = error.request
                    } else
                    {
                        this.responseMessage = error.message
                    }

                    this.isError = true
                    loadingOverlay.hide()
                })
        }
    }
})

export const useUserSession = () => {
    return JSON.parse(localStorage.getItem("user"))
}

function saveUserSession(user) {
    localStorage.setItem("user", JSON.stringify(user))
}