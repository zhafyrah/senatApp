import { defineStore } from 'pinia'
import { useLoading } from 'vue3-loading-overlay';
import { listKomentarRequest, insertKomentarRequest } from '../api/komentar-senat-api';
import { komentarForm } from '../utils/form-utils';

const loadingOverlay = useLoading()

function showLoading() {

    loadingOverlay.show({
        color: "#0069d9",
        blur: "5px"
    })
}

export const useKomentarSenatStore = defineStore("komentar-senat", {
    state: () => ({
        komentarData: [],
        errorMessage: "",
        totalData: 0,
        page: 1,
        lastPage: 1,
        totalPage: 1,
        lastNoPage: 0,
        isSuccessSubmit: false,
    }),
    actions: {
        getListKomentar() {
            showLoading()
            listKomentarRequest(this.page)
                .then((response) => {
                    //console.log('res', response)
                    if (response)
                    {
                        this.totalData = response.total
                        this.currentPage = response.current_page
                        this.totalPage = response.total > 10 ? Math.ceil(response.total / 10) : 1;
                        this.lastNoPage = response.from
                        this.komentarData = response.data
                    }

                    //console.log('data', this.komentarData)
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response)
                    {
                        this.errorMessage = error.response.data.message
                    } else if (error.request)
                    {
                        this.errorMessage = error.request
                    } else
                    {
                        this.errorMessage = error.message
                    }

                    loadingOverlay.hide()
                })
        },
        saveKomentar(komentar, attachmentFile) {
            showLoading()
            const form = komentarForm(komentar, attachmentFile)
            console.log('form', form)
            insertKomentarRequest(form)
                .then((response) => {
                    this.isSuccessSubmit = true
                    //console.log('response', response)
                    loadingOverlay.hide()


                    this.getListKomentar()
                }).catch((error) => {
                    if (error.response)
                    {
                        this.errorMessage = error.response.data.message
                    } else if (error.request)
                    {
                        this.errorMessage = error.request
                    } else
                    {
                        this.errorMessage = error.message
                    }

                    loadingOverlay.hide()
                })
        },

    }
})