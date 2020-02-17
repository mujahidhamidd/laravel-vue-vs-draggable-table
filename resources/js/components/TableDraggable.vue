<template>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Services</th>
            
                <th>Order</th>
                <th>Sort</th>
            </tr>
        </thead>

        <draggable :list="areasNew" :options="{animation:200, handle:'.my-handle'}" :element="'tbody'" @change="update">

            <tr v-for="(area, index) in areasNew">
                <td>
                    {{ area.id }}
                   

                </td>
                <td>{{ area.name }}</td>
                
                <td > <p v-for="(service, index) in area.services">{{ area.services[index].service }} <br></p></td>
              
                <td>{{ area.order }}</td>
                <td><i class="fa fa-arrows my-handle"></i></td>
            </tr>

        </draggable>

    </table>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: ['areas'],

        data() {
            return {
                areasNew: this.areas,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        methods: {
            update() {
                this.areasNew.map((area, index) => {
                    area.order = index + 1;
                })

                axios.put('/areas/updateAll', {
                    areas: this.areasNew
                }).then((response) => {
                    // success message
                })
            }
        },

        mounted() {
            
        }
    }
</script>
