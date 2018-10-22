<template>
        <form role="form" v-on:submit.prevent="onSubmit" method="post">
            <div class="form-group" :class="{ 'has-error': errors.review_date}">
                <label>Fecha de revision</label>
                <input v-model="review_date" type="date" class="form-control" >
            </div>
            <div class="form-group">
                <p>En una escala del 1 al 5, donde 1 significa NADA SATISFECHO, y 5, MUY SATISFECHO,</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" :class="{ 'has-error': errors.productivity}">
                        <label>Productividad</label>
                        <input v-model="productivity" type="number" class="form-control" placeholder="1 - 5">
                    </div>
                    <div class="form-group" :class="{ 'has-error': errors.knowledge}">
                        <label>Conocimiento del puesto</label>
                        <input v-model="knowledge" type="number" class="form-control" placeholder="1 - 5">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" :class="{ 'has-error': errors.relationship}">
                        <label>Relación y cooperación</label>
                        <input v-model="relationship" type="number" class="form-control" placeholder="1 - 5">
                    </div>
                    <div class="form-group" :class="{ 'has-error': errors.initiative}">
                        <label>Iniciativa y creatividad</label>
                        <input v-model="initiative" type="number" class="form-control" placeholder="1 - 5">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </form>
</template>

<script>
    export default {
        props: ['employee'],
        data() {
            return{
                review_date: '',
                productivity: '',
                knowledge: '',
                relationship: '',
                initiative: '',
                errors: [],
            }
        },
        created() {
            this.fetchReviews();
        },
        methods: {
            fetchReviews: function(){
                axios.get('/api/reviews').then((res) => {
                    this.reviews = res.data.data;
                });
            },
            onSubmit: function() {
                let performance = (parseFloat(this.productivity) + parseFloat(this.knowledge) + parseFloat(this.relationship) + parseFloat(this.initiative)) / 4.0;
                axios.post('/api/reviews', {
                    'review_date': this.review_date,
                    'employee_id': this.employee,
                    'productivity': this.productivity,
                    'knowledge': this.knowledge,
                    'relationship': this.relationship,
                    'initiative': this.initiative,
                    'performance': performance,
            }).then(response => {
                    console.log(response);
                    if(response.data.status == false){
                        this.errors = response.data.data;
                    }
                    else{
                        this.errors = [];
                        window.location.href = window.location.protocol + "//" + window.location.host + "/";
                    }
                });
            },
        }
    }
</script>