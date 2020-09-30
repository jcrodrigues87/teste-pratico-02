<template>
    
<div class="container">

    <h3 class="title" align="center">
        Listagem de Programadores
    </h3>
    

        <div class="box has-background-grey-light pt-1 pb-1 mb-0">

            <h3 class="subtitle" align="center">
                Filtrar por
            </h3>

            <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop mx-3 pb-0">
                
                <div class="column">
                    <label class="checkbox">
                    <input type="checkbox" v-model="checkName">
                        Nome
                    </label>
                </div>

                <div class="column">
                    <label class="checkbox">
                    <input type="checkbox" v-model="checkSkill">
                        Habilidades
                    </label>
                </div>


                <template>
                <div class="column" v-if="checkName || checkSkill">
                    <p class="buttons" align="center">
                        <button class="button is-info is-rounded" v-on:click="filter">
                            <span>Filtrar</span>
                            <span class="icon is-small">
                              <i class="fas fa-eye"></i>
                            </span>
                        </button>
                    </p>
                </div>
                </template>


            </div>
        </div>





        <template>


            <div class="box has-background-grey-lighter mb-0" v-if="checkName">

                <div class="field is-horizontal" >

                    <div class="field-label is-normal mb-0">
                    <label class="label">Nome</label>
                    </div>
                    <div class="field-body">
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            <input class="input is-info" v-model="name" type="text" placeholder="ex: José Alencar Oliveira">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                            </p>
                    </div>
                    </div>
                </div>
            </div>
                    


            <div class="box has-background-white-ter" v-if="checkSkill">

                <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop mx-3 mb-0">
            
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['java']">
                            Java
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['node']">
                            Node.js
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['cpp']">
                            C++
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['php']">
                            PHP
                        </label>
                    </div>
                    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['python']">
                            Python
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['go']">
                            GO
                        </label>
                    </div>
    
                </div>
        

                <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop mx-3">
                    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['advpl']">
                            ADVPL
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['angular']">
                            Angular
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['electron']">
                            Electron
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['react']">
                            React
                        </label>
                    </div>
                    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['native']">
                            Native
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['mongo']">
                            Mongo
                        </label>
                    </div>
    
                </div>
        
                <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop mx-3">
                    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['sql']">
                            SQL
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['sqlServer']">
                            SQLServer
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['postgres']">
                            Postgres
                        </label>
                    </div>
    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['backend']">
                            Back-End
                        </label>
                    </div>
                    
                    <div class="column">
                        <label class="checkbox">
                        <input type="checkbox" v-model="skills['frontend']">
                            Front-End
                        </label>
                    </div>

                    <div class="column">
                        <label class="checkbox">
                        </label>
                    </div>
    
                </div>


            </div>

        </template>




        <div class="box has-background-primary-dark mb-0">
            <div class="columns">
                <div class="column is-1">Código</div>
                <div class="column is-2">Nome</div>
                <div class="column is-3">E-mail</div>
                <div class="column is-2">Telefone</div>
                <div class="column is-4">Habilidades</div>

            </div>
        </div>

        <template v-for="(programmer, idx) in programmers">
        <div class="box has-background-primary mb-0" :key="idx" v-if="programmer.require">

            
            <div class="columns">
                <div class="column is-1">{{programmer.cod}}</div>
                <div class="column is-2">{{programmer.name}}</div>
                <div class="column is-3">{{programmer.email}}</div>
                <div class="column is-2">{{programmer.telephone}}</div>
                <div class="column is-4">{{skilled(programmer.skills)}}</div>
            </div>

        </div>
        </template>

</div>
</template>

<script>
const convert = {
  java: "Java",
  node: "Node.js",
  cpp: "C++",
  php: "PHP",
  python: "Python",
  go: "Go",
  advpl: "ADVPL",
  angular: "Angular",
  electron: "Electron",
  react: "React",
  native: "React Native",
  mongo: "MongoDB",
  sql: "MySQL",
  sqlServer: "SQLServer",
  postgres: "Postgres",
  backend: "Back-End",
  frontend: "Front-End",
};

export default {
  data() {
    return {
      checkName: true,
      checkSkill: false,

      name: "",
      skills: {
        java: false,
        node: false,
        cpp: false,
        php: false,
        python: false,
        go: false,
        advpl: false,
        angular: false,
        electron: false,
        react: false,
        native: false,
        mongo: false,
        sql: false,
        sqlServer: false,
        postgres: false,
        backend: false,
        frontend: false,
      },

      programmers: [
        {
          cod: 1,
          require: true,

          name: "João Florêncio da Silva",
          email: "joaoflorencio64@gmail.com",
          telephone: "37988156142",
          skills: {
            java: true,
            node: false,
            cpp: false,
            php: true,
            python: false,
            go: false,
            advpl: false,
            angular: true,
            electron: false,
            react: false,
            native: false,
            mongo: true,
            sql: false,
            sqlServer: false,
            postgres: false,
            backend: true,
            frontend: false,
          },
        },

        {
          cod: 2,
          require: true,

          name: "Maria do Rosário Lima",
          email: "mariadorosario70@gmail.com",
          telephone: "37999452151",
          skills: {
            java: true,
            node: false,
            cpp: false,
            php: true,
            python: true,
            go: false,
            advpl: false,
            angular: true,
            electron: false,
            react: true,
            native: false,
            mongo: true,
            sql: false,
            sqlServer: true,
            postgres: false,
            backend: true,
            frontend: false,
          },
        },
      ],
    };
  },

  methods: {
    filter: function () {
      var dev;

      for (let i in this.programmers) {
        dev = this.programmers[i];

        if (this.filter_name(dev) && this.filter_skill(dev))
          this.programmers[i].require = true;
        else this.programmers[i].require = false;
      }
    },

    filter_name: function (dev) {
      return dev.name.includes(this.name);
    },

    filter_skill: function (dev) {
      for (let skill in this.skills)
        if (this.skills[skill]) if (!dev.skills[skill]) return false;

      return true;
    },

    skilled: function (skills) {
      var list = [];
      for (let skill in skills) if (skills[skill]) list.push(skill);

      return this.listToStr(list);
    },

    listToStr: function (list) {
      let string = "";
      let item;

      for (item in list) string += convert[list[item]] + ", ";

      return string.slice(0, -2);
    },
  },
};
</script>