import { defineStore } from 'pinia'
import { useLoading } from 'vue3-loading-overlay';
import { listDokKomisiRequest, insertDokKomisiRequest, updateDokKomisiRequest, deleteDokKomisiRequest, getById } from '../api/dokumen-komisi-api';
import { formatDateToServer } from "../utils/date-utils"

const loadingOverlay = useLoading()

function showLoading() {
    loadingOverlay.show({
        color: "#0069d9",
        blur: "5px"
    })
}

function resultDokKomisiForm(dokPlenoForm, dokumenFile) {
    const formData = new FormData()
    formData.append('no_surat', dokPlenoForm.noSurat)
    formData.append('keterangan', dokPlenoForm.keterangan)
    formData.append('tanggal_unggah', formatDateToServer(dokPlenoForm.tanggal_unggah))
    formData.append('status', dokPlenoForm.status)
    formData.append('dokumen', dokumenFile)

    return formData
}

export const useDokKomisiStore = defineStore("dokumen-komisi", {
    state: () => ({
        dokData: [],
        singleData: {},
        errorMessage: "",
        totalData: 0,
        page: 1,
        lastPage: 1,
        totalPage: 1,
        lastNoPage: 0,
        isSuccessSubmit: false,
    }),
    actions: {
        getList() {
            showLoading()
            listDokKomisiRequest(this.page)
                .then((response) => {
                    this.totalData = response.total
                    this.currentPage = response.current_page
                    this.totalPage = response.total > 10 ? Math.ceil(response.total / 10) : 1;
                    this.lastNoPage = response.from
                    this.dokData = response.data

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
        saveDokKomisi(dokKomisiForm, dokumenFile) {
            showLoading()
            insertDokKomisiRequest(resultDokKomisiForm(dokKomisiForm, dokumenFile))
                .then((response) => {
                    this.isSuccessSubmit = true
                    //console.log('response', response)
                    loadingOverlay.hide()
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
        updateDokKomisi(id, dokKomisiForm, dokumenFile) {
            showLoading()
            updateDokKomisiRequest(id, resultDokPlenoForm(dokKomisiForm, dokumenFile))
                .then((response) => {
                    this.isSuccessSubmit = true
                    //console.log('response', response)
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
        deleteDokKomisi(id) {
            showLoading()
            deleteDokKomisiRequest(id)
                .then((response) => {
                    this.isSuccessSubmit = true
                    //console.log('response', response)
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
        getDokKomisiById(id) {
            showLoading()
            getById(id)
                .then((response) => {
                    //console.log('byid', response)
                    this.singleData = response.data
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
        }
    }
})