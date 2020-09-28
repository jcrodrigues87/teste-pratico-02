

// define(function (require) {
//   var axios = require('axios');
// });


// const axios = require('axios');

const app = new Vue({
    el: '#app',
    data: {

        name: '',
        email: '',
        telephone: '',
        birth: '',
        cep: '',
        uf: '',
        city: '',
        street: '',
        complement: '',

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

        formations: [] 
        
    },

    methods: {
        addFormation: function () {

          this.formations.push(
            {
              'course': '',
              'institute': '',
              'conclusion': ''
            }
          );

          //console.log(this.formations);

          return 0;

        },

        registerProfile: function(){
          
          validate = this.validations()

          if (validate){
            return true
          }

          return false
        },

        clearData: function(){
          this.name = '';
          this.email = '';
          this.telephone = '';
          this.birth = '';
          this.cep = '';
          this.uf = '';
          this.city = '';
          this.street = '';
          this.complement = ''; 
          
          var skill;
          for (skill in this.skills){
            this.skills[skill] = false
          }

          this.formations = []

        },

        async getAdress () {
            if (this.cep.length == 8) { 
                
              //let resposta = await axios.get("https://viacep.com.br/ws/" + this.cep + "/json/")
              //print(resposta)
              //this.endereco = resposta.data
            }
        },

        validations: function(){
          if (!this.emailVal())
            return false
          if (!this.telephoneVal())
            return false
          if (!this.birthVal())
            return false                  
          if (!this.cepVal())
            return false
          if (this.emptyField())
            return false
          return true
        },

        emailVal: function(){
          return true
        },

        telephoneVal: function(){
          return true
        },

        birthVal: function(){
          return true
        },

        cepVal: function(){
          return true
        },

        emptyField: function(){
          return false
        }
      }
})