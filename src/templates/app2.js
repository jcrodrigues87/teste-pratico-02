
const convert = {
    'java': "Java",
    'node': "Node.js",
    'cpp': "C++",
    'php': "PHP",
    'python': "Python",
    'go': "Go",
    'advpl': "ADVPL",
    'angular': "Angular",
    'electron': "Electron",
    'react': "React",
    'native': "React Native",
    'mongo': "MongoDB",
    'sql': "MySQL",
    'sqlServer': "SQLServer",
    'postgres': "Postgres",
    'backend': "Back-End",
    'frontend': "Front-End"
}

const app = new Vue({
    el: '#app',
    data: {

        checkName: true,
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



        programmers: [
            {
                cod: 1,
                require:true,

                name: 'João Florêncio da Silva',
                email: 'joaoflorencio64@gmail.com',
                telephone: "37988156142",
                skills:{
                    'java': true,
                    'node': false,
                    'cpp': false,
                    'php': true,
                    'python': false,
                    'go': false,
                    'advpl': false,
                    'angular': true,
                    'electron': false,
                    'react': false,
                    'native': false,
                    'mongo': true,
                    'sql': false,
                    'sqlServer': false,
                    'postgres': false,
                    'backend': true,
                    'frontend': false
                }
            },

            {
                cod: 2,
                require:true,

                name: 'Maria do Rosário Lima',
                email: 'mariadorosario70@gmail.com',
                telephone: "37999452151",
                skills:{
                    'java': true,
                    'node': false,
                    'cpp': false,
                    'php': true,
                    'python': true,
                    'go': false,
                    'advpl': false,
                    'angular': true,
                    'electron': false,
                    'react': true,
                    'native': false,
                    'mongo': true,
                    'sql': false,
                    'sqlServer': true,
                    'postgres': false,
                    'backend': true,
                    'frontend': false
                }
            }
        ]

    },

    methods: {
        filter: function() {
            var dev;
            
            
            for (i in this.programmers){
                dev = this.programmers[i]
                
                if (this.filter_name(dev) && this.filter_skill(dev))
                    this.programmers[i].require = true
                else
                    this.programmers[i].require = false
            }
        },
        
        filter_name: function(dev) {
            return dev.name.includes(this.name)
        },

        filter_skill: function(dev) {
            for (skill in this.skills)
                if (this.skills[skill])
                    if (!dev.skills[skill])
                        return false
            
            return true
        },

        skilled: function(skills) {

            var list = [];
            var skill;
            for (skill in skills) 
                if (skills[skill])
                    list.push(skill)

            return this.listToStr(list)
        },

        listToStr: function(list){
            string = ''
            var item;

            for (item in list)
                string += convert[list[item]] + ', '

            return string.slice(0, -2);
        }
    }

})

