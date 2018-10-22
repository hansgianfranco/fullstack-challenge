<template>
    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-striped b-t b-b">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Puesto</th>
                        <th>Area</th>
                        <th>Evaluar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="employee in employees" align="left">
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.since }}</td>
                        <td>{{ employee.position }}</td>
                        <td>{{ employee.division }}</td>
                        <td>
                            <a :href="'/feedback/'+employee.id" class="btn btn-xs btn-primary"><span class="fa fa-edit"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                employees: []
            }
        },
        created() {
            this.fetchEmployees();
        },
        methods: {
            fetchEmployees: function() {
                axios.get('/api/employees').then((res) => {
                    this.employees = res.data.data;
                });
            }
        }
    }
</script>