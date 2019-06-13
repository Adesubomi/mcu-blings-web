<template>
    <div>
        <div class="border-bottom">
            <div class="row align-items-center">
                <div class="col mr-auto">
                    <h2 class="m-0 p-0">
                        Student Information
                    </h2>
                    <h5 class="text-muted font-weight-lighter">Student's registered information</h5>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="ion ion-edit"></i> &nbsp;
                        Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="mb-4"></div>
        <div v-if="loading">
            <loader></loader>
        </div>
        <div v-if="!loading">
            <div class="row" v-if="student && student.firstname">
                <div class="col">
                    <div class="profile-picture-holder text-center">
                        <div class="ss-student-gender">Male</div>
                        <div class="picture-dummy">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                    <div class="ss-student-name">
                        <span v-text="student.lastname"></span>&nbsp;<span v-text="student.firstname"></span>
                    </div>
                    <div class="ss-student-level">
                        Level: <span v-text="student.level"></span>00 Level
                    </div>
                </div>
                <div class="col">
                    <div class="row ss-student-info">
                        <div class="col ss-label">First name:</div>
                        <div class="col ss-value"><span v-text="student.firstname"></span></div>
                    </div>
                    <div class="row ss-student-info">
                        <div class="col ss-label">Last name:</div>
                        <div class="col ss-value"><span v-text="student.lastname"></span></div>
                    </div>
                    <div class="row ss-student-info">
                        <div class="col ss-label">Email:</div>
                        <div class="col ss-value"><span v-text="student.email"></span></div>
                    </div>
                    <div class="row ss-student-info">
                        <div class="col ss-label">Phone:</div>
                        <div class="col ss-value"><span v-text="student.phone"></span></div>
                    </div>
                </div>
                <div class="col">
                    <div class="row ss-student-info">
                        <div class="col ss-label">College:</div>
                        <div class="col ss-value"><span v-text="student.college"></span></div>
                    </div>
                    <div class="row ss-student-info">
                        <div class="col ss-label">Department:</div>
                        <div class="col ss-value"><span v-text="student.department"></span></div>
                    </div>
                    <div class="row ss-student-info">
                        <div class="col ss-label">Matric Number:</div>
                        <div class="col ss-value"><span v-text="student.matric_number"></span></div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="text-center text-muted">
                    <h3>Oops</h3>
                    <div>Student information was not found</div>
                    <div class="mt-3">
                        <button class="btn btn-outline-primary" @click="getStudent">Retry</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['studentId'],
        data: function () {
            return {
                loading: false,
                student: null,
            }
        },
        mounted() {
            this.getStudent();
            console.log(this.studentId);
        },
        methods: {

            getStudent: function () {

                this.loading = true;

                axios.get(this.api('students.show', {student_id: this.studentId}))
                    .then(response => {
                        this.loading = false;
                        this.student = response.data.payload;
                    })
                    .catch(error => {
                        this.student = null;
                        this.loading = false;
                    });
            }
            ,

            student_level: function (student) {

                if (student.level == null || student.level == undefined) {
                    return '1';
                }
                return student.level;
            }
        }
    }
</script>

<style scoped lang="scss">
    .profile-picture-holder {
        border: 1px solid #ddd;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        margin: 0 auto;
        position: relative;

        .ss-student-gender {
            position: absolute;
            padding: 2px 10px;
            font-size: 12px;
            border-radius: 4px;
            margin: 0 auto;
            font-weight: bold;
            color: #fff;
            background-color: #1b4b72;
            top: 4px;
            left: -4px;
        }

        .picture-dummy {
            margin-top: 0; font-size: 5em; color: #ccc;
        }
    }

    .ss-student-name {
        font-size: 20px;
        padding-left: 16px;
        padding-right: 16px;
        text-align: center;
        margin-top: 16px;
    }

    .ss-student-level {
        color: #636b6f;
        text-align: center;
    }

    .ss-student-info {
        margin-bottom: 20px;
        align-items: center;

        .ss-label { font-size: 0.8em; color: #606060; font-weight: lighter; text-align: right; }
        .ss-value { font-size: 1em; text-align: left; }
    }
</style>