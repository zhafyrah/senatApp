<script setup>
import { computed } from 'vue';
const props = defineProps({
    labelName: {
        type: String,
        required: true,
    },
    name: {
        type: [String, Number, Boolean, Array, Object],
        default: ''
    },
    pendidikan: {
        type: [String, Number, Boolean, Array, Object],
        default: ''
    },
    colClass: {
        type: String,
        default: 'col-sm-2'
    },
    showBorder: Boolean
})

const emit = defineEmits(['update:name', 'update:pendidikan', 'setRef'])

const computedValueName = computed({
    get: () => props.name,
    set: value => {
        emit('update:name', value)
    }
})

const computedValuePendidikan = computed({
    get: () => props.pendidikan,
    set: value => {
        emit('update:pendidikan', value)
    }
})
</script>
<template>
    <div :class="`d-flex flex-row justify-content-center align-items-center p-2 mx-2 my-2`">
        <div class="row row-cols-1 justify-content-center align-items-center">
            <div class="col d-flex justify-content-center">
                <img src="../assets/img/icon/user.png" width="50" height="50" />
            </div>
            <div class="col">
                <div class="row mt-3 align-items-center justify-content-center">
                    <label for="ketua-komisi-a" :class="colClass" class="small"> {{ labelName }} </label>
                    <div :class="colClass">
                        <input type="text" id="ketua-komisi-a" class="form-control" v-model="computedValueName"
                            placeholder="" />
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mt-1 align-items-center justify-content-center">
                    <label for="pendidikan-ketua-komisi-a" :class="colClass" class="small">Pendidikan</label>
                    <div :class="colClass">
                        <input type="text" id="pendidikan-ketua-komisi-a" class="form-control"
                            v-model="computedValuePendidikan" placeholder="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>