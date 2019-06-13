<template>
    <div>
        <div class="border-bottom">
            <div class="row align-items-baseline">
                <div class="col">
                    <h2 class="m-0 p-0">
                        Students
                    </h2>
                    <h5 class="text-muted font-weight-lighter">Manage list of all students in school</h5>
                </div>
                <div class="col-auto">
                    <span class="text-muted">Filter by:</span>
                </div>
                <div class="col-auto">
                    <div class="filters">
                        <select name="filter-students" id="" class="form-control form-control-sm">
                            <option v-for="i of 4" :value="i">{{i}}00 Level</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-outline-primary" href="/students/create">
                        <i class="ion-ios-personadd"></i>
                        New Student
                    </a>
                </div>
            </div>
        </div>

        <div v-if="loading">
            <loader></loader>
        </div>

        <div v-if="!loading">
            <div v-if="students == null" class="text-center mt-5">
                <h4>Unable to load students</h4>
                <div><button @click.prevent="getStudents" class="btn btn-sm btn-outline-danger">Retry</button></div>
            </div>
            <div v-else-if="students.length === 0" class="text-center mt-5">
                <h4>No students added</h4>
                <div>
                    <a class="btn btn-sm btn-outline-primary" href="/students/create">Add New Student</a>
                </div>
            </div>
            <div class="table-responsive" v-else-if="students.length > 0">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Matric No.</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Department</th>
                    </tr>
                    </thead>
                    <tr v-for="student of students">
                        <td>
                            <a :href="web('students.show', {student_id: student.id})">
                                <span v-text="student.matric_number"></span>
                            </a>
                        </td>
                        <td>
                            <a :href="web('students.show', {student_id: student.id})">
                                <span v-text="student.lastname +' '+ student.firstname"></span>
                            </a>
                        </td>
                        <td><span v-text="student_level(student) + '00 Level'"></span></td>
                        <td><span v-text="student.department"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                loading: false,
                students: null,
            }
        },
        mounted() {
            this.getStudents();
        },
        methods: {

            getStudents: function () {

                this.loading = true;

                axios.get( this.api('students') )
                    .then(response => {
                        this.loading = false;
                        this.students = response.data.payload;
                    })
                    .catch(error => {
                        this.students = null;
                        this.loading = false;
                    });
            },

            student_level: function (student) {

                if (student.level == null || student.level == undefined) {
                    return '1';
                }
                return student.level;
            }
        }
    }
</script>

<style scoped>

</style>