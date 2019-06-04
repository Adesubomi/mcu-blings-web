<template>
    <div>
        <div class="border-bottom">
            <div class="row align-items-baseline">
                <div class="col-auto">
                    <a href="/students/create" class="btn btn-outline-secondary">
                        <i class="ion-chevron-left"></i>
                    </a>
                </div>
                <div class="col">
                    <h2 class="m-0 p-0">
                        New Students
                    </h2>
                    <h5 class="text-muted">Create a new student record for McPherson</h5>
                </div>
            </div>
        </div>

        <div v-if="stage == 0">
            <div class="row pt-5">
                <div class="col">

                    <div class="form-group row">
                        <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>

                        <div class="col-md-6">
                            <input id="firstname" type="text" class="form-control"
                                   name="firstname" required autocomplete="firstname" autofocus>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control"
                                   name="lastname" required autocomplete="lastname"/>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required
                                   autocomplete="email"/>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone number</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="email" required
                                   autocomplete="email">

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="form-group row">
                        <label for="college" class="col-md-4 col-form-label text-md-right">College</label>

                        <div class="col-md-6">
                            <select id="college" class="form-control" name="college" required>
                                <option></option>
                            </select>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                        <div class="col-md-6">
                            <select id="department" class="form-control" name="department" required>
                                <option></option>
                            </select>

                            <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="matric_number" class="col-md-4 col-form-label text-md-right">Matric No.</label>

                        <div class="col-md-6">
                            <input id="matric_number" type="text" class="form-control"
                                   name="matric_number" value="" required/>

                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div v-if="stage == 1">
            <div class="row align-items-start">
                <div class="col-md-6 border-right">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <div class="mt-4 pt-4">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-2 pt-2">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-1 pt-1">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-4 pt-4">
                                <div class="fingerprint-display">
                                    <div class="indicator"></div>
                                    <div class="label">Left Index</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ml-4">
                            <div class="mt-5 pt-5">
                                <div class="fingerprint-display">
                                    <div class="indicator"></div>
                                    <div class="label">Left Thumb</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hand-display">
                        <i class="ion-android-hand"></i>
                    </div>
                </div>
                <div class="col-md-6 border-left">
                    <div class="row justify-content-start">
                        <div class="col-auto mr-4">
                            <div class="mt-5 pt-5">
                                <div class="fingerprint-display">
                                    <div class="label">Right Thumb</div>
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-4 pt-4">
                                <div class="fingerprint-display">
                                    <div class="label">Right Index</div>
                                    <div class="indicator">
                                        <div class="bg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-1 pt-1">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-2 pt-2">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mt-4 pt-4">
                                <div class="fingerprint-display disabled">
                                    <div class="indicator"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hand-display flip-x">
                        <i class="ion-android-hand"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top pt-4 mt-4 text-right">
            <button type="submit" class="btn btn-success btn-lg" @click.prevent="changeStage">
                <span v-if="stage==0">Next</span>
                <span v-if="stage==1">Submit</span>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['action'],
        data() {
            return {
                stage: 0,
                url: {
                    student_store: '/',
                },
                form_data: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                    college: '',
                    department: '',
                    matric_number: '',
                    fingerprint: {
                        left_index: '',
                        right_index: '',
                        left_thumb: '',
                        right_thumb: '',
                    },
                },
            }
        },
        mounted() {

        },
        methods: {
            changeStage: function () {

                if (this.stage == 0) this.stage = 1;
                else if (this.stage == 1) {
                    this.submit();
                }
            },

            submit: function () {

                axios.post(this.url.student_store, this.form_data)
                    .then( (response) => {

                    })
                    .catch( (error) => {

                    });

            }
        }
    }
</script>

<style scoped>

</style>