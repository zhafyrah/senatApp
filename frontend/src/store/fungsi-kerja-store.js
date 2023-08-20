import {
    defineStore
} from 'pinia'
import {
    useLoading
} from 'vue3-loading-overlay';
import {
    listFungsiKerjaRequest,
    insertFungsiKerjaRequest,
    updateFungsiKerjaRequest,
    deleteFungsiKerjaRequest,
    getById
} from '../api/fungsi-kerja-api';

const loadingOverlay = useLoading()

function showLoading() {
    loadingOverlay.show({
        color: "#0069d9",
        blur: "5px"
    })
}

function resultFungsiKerjaForm(fungsiKerjaForm, additionalFields) {
    const formData = new FormData();

    formData.append('komisi', fungsiKerjaForm.komisi);
    formData.append('nama_komisi', fungsiKerjaForm.namaKomisi);
    formData.append('ketua_komisi', fungsiKerjaForm.ketuaKomisi);
    formData.append('fungsi_kerja', fungsiKerjaForm.fungsiKerja);

    // Menambahkan data anggota dinamis
    additionalFields.forEach((anggota, index) => {
        formData.append(`nama_anggota${index + 1}`, anggota.value);
    });
    return formData;
}


export const useFungsiKerjaStore = defineStore("fungsi-kerja", {
    state: () => ({
        fungsiKerjaData: [],
        singleData: {},
        errorMessage: "",
        totalData: 0,
        page: 1,
        lastPage: 1,
        totalPage: 1,
        lastNoPage: 0,
        isSuccessSubmit: false,
        submitMessage: ""
    }),
    actions: {
        getList() {
            this.totalData = 0
            this.totalPage = 1
            this.lastNoPage = 0
            this.fungsiKerjaData = []
            this.errorMessage = ""

            showLoading()
            listFungsiKerjaRequest(this.page)
                .then((response) => {
                    this.totalData = response.total
                    this.totalPage = response.total > 10 ? Math.ceil(response.total / 10) : 1;
                    this.lastNoPage = response.from
                    this.fungsiKerjaData = response.data
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response) {
                        this.errorMessage = error.response.data.message
                    } else if (error.request) {
                        this.errorMessage = error.request
                    } else {
                        this.errorMessage = error.message
                    }
                    loadingOverlay.hide()
                })
        },
        saveFungsiKerja(fungsiKerjaForm, additionalFields) {
            this.isSuccessSubmit = false
            this.errorMessage = ""
            this.submitMessage = ""
            showLoading()
            insertFungsiKerjaRequest(resultFungsiKerjaForm(fungsiKerjaForm, additionalFields))
                .then((response) => {

                    this.isSuccessSubmit = true
                    this.submitMessage = "Data Fungsi Kerja Berhasil di Simpan"
                    loadingOverlay.hide()
                }).catch((error) => {
                    if (error.response) {
                        this.errorMessage = error.response.data.message
                    } else if (error.request) {
                        this.errorMessage = error.request
                    } else {
                        this.errorMessage = error.message
                    }
                    loadingOverlay.hide()
                })
        },
        updateFungsiKerja(id, fungsiKerjaForm) {
            this.isSuccessSubmit = false
            this.errorMessage = ""
            this.submitMessage = ""

            showLoading()
            updateFungsiKerjaRequest(id, resultFungsiKerjaForm(fungsiKerjaForm))
                .then((response) => {
                    this.isSuccessSubmit = true
                    this.submitMessage = "Data Fungsi Kerja Berhasil di Update"
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response) {
                        this.errorMessage = error.response.data.message
                    } else if (error.request) {
                        this.errorMessage = error.request
                    } else {
                        this.errorMessage = error.message
                    }
                    loadingOverlay.hide()
                })
        },
        deleteFungsiKerja(id) {
            this.isSuccessSubmit = false
            this.errorMessage = ""
            this.submitMessage = ""

            showLoading()
            deleteFungsiKerjaRequest(id)
                .then((response) => {
                    this.isSuccessSubmit = true
                    this.submitMessage = "Data Fungsi Kerja Berhasil di Hapus"
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response) {
                        this.errorMessage = error.response.data.message
                    } else if (error.request) {
                        this.errorMessage = error.request
                    } else {
                        this.errorMessage = error.message
                    }

                    loadingOverlay.hide()
                })
        },
        getFungsiKerjaById(id) {
            this.errorMessage = ""
            this.singleData = {}

            showLoading()
            getById(id)
                .then((response) => {
                    this.singleData = response.data
                    loadingOverlay.hide()
                })
                .catch((error) => {
                    if (error.response) {
                        this.errorMessage = error.response.data.message
                    } else if (error.request) {
                        this.errorMessage = error.request
                    } else {
                        this.errorMessage = error.message
                    }
                    loadingOverlay.hide()
                })
        }
    }
})