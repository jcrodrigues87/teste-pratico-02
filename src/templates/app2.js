

const app = new Vue({
    el: '#app',
    data: {

        checkName: false,
        checkSkill: false,

        name: '',
        skills: {
            'java': false,
            'node': false,
            'cpp': false,
            'php': false,
            'python': false,
            'go': false,
            'advpl': false,
            'angular': false,
            'electron': false,
            'react': false,
            'native': false,
            'mongo': false,
            'sql': false,
            'sqlServer': false,
            'postgres': false,
            'backend': false,
            'frontend': false
        },

        programers: []
        
    },

    methods: {
        filter: function () {
        }    
    }

})