<template>
    <div>
        <vue-snotify></vue-snotify>
        <div class="border-bottom">
            <div class="row align-items-baseline">
                <div class="col-auto">
                    <a href="/students" class="btn btn-outline-secondary">
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

        <div v-if="posting">
            <loader></loader>
        </div>
        <div v-if="!posting">
            <div v-if="stage == 0">
                <div class="row pt-5">
                    <div class="col">

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">
                                First Name <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" v-model="form_data.firstname"
                                       autofocus/>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                                Last Name <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" v-model="form_data.lastname"/>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                E-Mail Address <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form_data.email"/>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                Phone number <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" v-model="form_data.phone"/>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genderField" class="col-md-4 col-form-label text-md-right">
                                Gender <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <select id="genderField" class="form-control" v-model="form_data.gender">
                                    <option value="f">Female</option>
                                    <option value="m">Male</option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group row">
                            <label for="college" class="col-md-4 col-form-label text-md-right">
                                College <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <select id="college" class="form-control" v-model="form_data.college"
                                        :disabled="!has_colleges">
                                    <option v-for="college of colleges" :value="college.short_name">
                                        {{college.short_name.toUpperCase()}} - {{ college.name }}
                                    </option>
                                </select>
                                <div class="pt-2 text-left d-inline-block" v-if="loading">
                                    <inline-loader></inline-loader>
                                </div>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">
                                Department <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" :disabled="!has_departments"
                                        v-model="form_data.department">
                                    <option v-for="department of departments" :value="department.name">
                                        {{ department.name }}
                                    </option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matric_number" class="col-md-4 col-form-label text-md-right">
                                Matric No. <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="matric_number" type="text" class="form-control"
                                       v-model="form_data.matric_number"/>

                                <div class="pt-2 text-left d-inline-block" v-if="loading">
                                    <inline-loader></inline-loader>
                                </div>
                                <div class="text-muted" v-else>
                                    <small>Last Matric Number: <span v-text="lastMatricNumber"></span></small>
                                </div>


                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="levelField" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">
                                <select v-model="form_data.level" id="levelField" class="form-control">
                                    <option v-for="i of 4" :value="i">{{i}}00 Level</option>
                                </select>

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
                                        <div class="label">Left Index</div>
                                        <div class="indicator"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto ml-4">
                                <div class="mt-5 pt-5">
                                    <div class="fingerprint-display">
                                        <div class="label">Left Thumb</div>
                                        <div class="indicator"></div>
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

            <div v-if="stage == 2">
                <div class="text-center mt-5">
                    <h4 class="text-success">Student added</h4>
                    <div class="text-muted">Student record has been added successfully</div>
                    <div class="mt-3">
                        <button @click.prevent="resetForm" class="btn btn-sm btn-outline-primary">New Student</button>
                    </div>
                </div>
            </div>
            <div class="border-top pt-4 mt-4 text-right" v-if="stage < 2">

                <button type="submit" class="btn btn-outline-primary btn-lg" v-if="stage>0" @click.prevent="stage--">
                    <i class="ion-ios-arrow-back"></i>
                </button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success btn-lg" @click.prevent="changeStage">
                    <span v-if="stage==0">Next</span>
                    <span v-if="stage==1">Submit</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['action'],
        data() {
            return {
                stage: 0,
                loading: false,
                posting: false,
                colleges: [],
                last_matric_number: '',
                form_data: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                    gender: '',
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
            this.getData();
        },
        computed: {

            has_colleges: function () {
                return (this.colleges != undefined && this.colleges != null && this.colleges.length > 0);
            },

            has_departments: function () {
                return (this.departments != undefined && this.departments != null && this.departments.length > 0);
            },

            departments: function () {
                let college = this.form_data.college;

                let fDepartments = this.colleges.filter((el) => el.short_name == college);

                if (fDepartments.length > 0) {
                    let fDepartment = fDepartments[0];
                    return fDepartment.departments;
                }
                else {
                    return [];
                }
            },

            lastMatricNumber: function () {
                if (this.last_matric_number == '') {
                    return 'xxx-xxx';
                }
                return this.last_matric_number;
            }
        },
        methods: {
            getData: function () {

                this.loading = true;

                axios.get(this.api('pd.colleges-alt'))
                    .then(response => {
                        this.loading = false;
                        this.colleges = response.data.payload.colleges;
                        this.last_matric_number = response.data.payload.last_matric_number;
                    })
                    .catch(error => {
                        this.colleges = [];
                        this.loading = false;
                    });

            },

            changeStage: function () {

                if (this.stage == 0) {

                    if (this.form_data.firstname.length == 0) {
                        this.$snotify.warning(`first name is a required input`, `Input error`);
                        return;
                    }

                    if (this.form_data.lastname.length == 0) {
                        this.$snotify.warning(`last name is a required input`, `Input error`);
                        return;
                    }

                    if (this.form_data.email.length == 0) {
                        this.$snotify.warning(`email is a required input`, `Input error`);
                        return;
                    }

                    if (this.form_data.phone.length == 0) {
                        this.$snotify.warning(`phone is a required input`, `Input error`);
                        return;
                    }

                    if (this.form_data.college.length == 0) {
                        this.$snotify.warning(`you have to select a college`, `Input error`);
                        return;
                    }

                    if (this.form_data.department.length == 0) {
                        this.$snotify.warning(`you have to select a department`, `Input error`);
                        return;
                    }

                    if (this.form_data.matric_number.length == 0) {
                        this.$snotify.warning(`please fill student's matriculation number`, `Input error`);
                        return;
                    }
                    this.stage = 1;
                }
                else if (this.stage == 1) {
                    this.submit();
                }
            },

            submit: function () {

                let url = this.api('students.store');
                this.posting = true;

                axios.post(url, this.form_data)
                    .then((response) => {

                        this.posting = false;
                        this.$snotify.success(`Student record has been added successfully`, `Great!`);
                        this.stage = 2;
                        console.log(response);

                    })
                    .catch((error) => {
                        this.posting = false;

                        if (error.response.status === 422) {
                            let errors = error.response.data.errors;
                            let errorKeys = Object.keys(errors);

                            for (let errorKey of errorKeys) {
                                let fieldErrors = errors[errorKey];
                                this.$snotify.error(`${fieldErrors[0]}`, `Validation error`);
                                break;
                            }

                            this.stage = 1;
                            return;
                        }

                        this.stage = 1;
                        this.$snotify.error(`Unable to create student record`, `Sorry`);
                    });

            },

            resetForm: function () {
                this.form_ = {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                    gender: '',
                    college: '',
                    department: '',
                    matric_number: '',
                    fingerprint: {
                        left_index: '',
                        right_index: '',
                        left_thumb: '',
                        right_thumb: '',
                    },
                };

                this.stage = 0;
            },
        }
    }
</script>

<style scoped>
</style>