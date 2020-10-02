<template>
  <div class="container">
    <h3 class="title" align="center">
      Cadastro de Programador
    </h3>
    <div class="box has-background-grey-light mb-0">
      <h3 class="subtitle" align="center">
          Dados básicos
      </h3>
      <div class="field is-horizontal">
          <div class="field-label is-normal ">
            <label class="label">Nome</label>
          </div>
          <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                  <input class="input is-info" v-model="name" type="text" placeholder="ex: José Alencar Oliveira" required>
                  <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                  </span>
                </p>
            </div>
          </div>
          <div class="field-label is-normal">
            <label class="label">Email</label>
          </div>
          <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                  <input class="input is-info" v-model="email" type="email" placeholder="ex: josealencar@gmail.com" required>
                  <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                  </span>
                </p>
            </div>
          </div>
      </div>
      <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Telefone</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="telephone" type="tel" placeholder="ex: (DDD) 99999-9999" required>
                </div>
            </div>
          </div>
          <div class="field-label is-normal">
            <label class="label">Nascimento</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="birth" type="date" placeholder="ex: 01/01/2000" required>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="box has-background-grey mb-0">
      <h3 class="subtitle" align="center">
          Endereço
      </h3>
      <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">CEP</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="cep" @input="getAdress" type="text" placeholder="ex: 12345678" required>
                </div>
            </div>
          </div>
          <div class="field-label is-normal">
            <label class="label">UF</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="uf" type="text" placeholder="" readonly required>
                </div>
            </div>
          </div>
          <div class="field-label is-normal">
            <label class="label">Cidade</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="city" type="text" placeholder="" readonly required>
                </div>
            </div>
          </div>
      </div>
      <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Logradouro</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="street" type="text" placeholder="" required>
                </div>
            </div>
          </div>
          <div class="field-label is-normal">
            <label class="label">Complemento</label>
          </div>
          <div class="field-body">
            <div class="field">
                <div class="control">
                  <input class="input is-info" v-model="complement" type="text" placeholder="">
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="box has-background-grey-light ">
      <h3 class="subtitle" align="center">
          Habilidades
      </h3>
      <div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop mx-3">
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
    <p class="buttons mx-4 is-centered">
      <button class="button is-info is-rounded  " v-on:click="addFormation">Adicionar Formação</button>
      <button class="button is-danger is-filled is-rounded " v-on:click="clearFormation">
      <span>Limpar Formações</span>
      <span class="icon is-small">
      <i class="fas fa-times"></i>
      </span>
      </button>
    </p>
    <div v-for="(item, idx) in formations" :key="idx" class="box has-background-gray mb-0">
        <div class="field is-horizontal ">
          <div class="field-label is-normal ">
              <label class="label">Curso</label>
          </div>
          <div class="field-body">
              <div class="field">
                <input class="input is-info" v-model="item['course']" type="text" placeholder="ex: Ciência da Computação">
              </div>
          </div>
          <div class="field-label is-normal ">
              <label class="label">Instituição</label>
          </div>
          <div class="field-body">
              <div class="field">
                <input class="input is-info" v-model="item['institute']" type="text" placeholder="ex: IFMG">
              </div>
          </div>
          <div class="field-label is-normal">
              <label class="label">Conclusão</label>
          </div>
          <div class="field-body">
              <div class="field">
                <div class="control">
                    <input class="input is-info" v-model="item['conclusion']" type="date" placeholder="ex: 01/01/2000">
                </div>
              </div>
          </div>
        </div>
    </div>
    <br />
    <p class="buttons mx-4 is-centered">
      <button class="button is-success is-rounded" v-on:click="registerProfile">
      <span class="icon is-small">
      <i class="fas fa-check"></i>
      </span>
      <span>Cadastrar</span>
      </button>
      <button class="button is-danger is-outlined is-rounded" v-on:click="clearData">
      <span>Limpar Formulário</span>
      <span class="icon is-small">
      <i class="fas fa-times"></i>
      </span>
      </button>
    </p>
  </div>
</template>

<script>
const axios = require('axios');

export default {
  data() {
    return {
      name: "",
      email: "",
      telephone: "",
      birth: "",
      cep: "",
      uf: "",
      city: "",
      street: "",
      complement: "",

      programmers: [],

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
      formations: [],
    }
  },

  async created () {
    this.fetchProfiles()
  },

  methods: {

    fetchProfiles: function () {
      axios.get('http://localhost:8000/profiles/profile-list/')
        .then((response) => {
          this.programmers = response.data
        })
    },

    addFormation: function () {
      this.formations.push({
        course: "",
        institute: "",
        conclusion: "",
      });

      return 0;
    },

    registerProfile: function () {
      let f = this.formations;
      let programmer = this.saveProgrammer(f);
      
      axios.post('http://localhost:8000/profiles/profile-create/', programmer)

      return true;
    },

    clearData: function () {
      this.name = "";
      this.email = "";
      this.telephone = "";
      this.birth = "";
      this.cep = "";
      this.uf = "";
      this.city = "";
      this.street = "";
      this.complement = "";

      var skill;
      for (skill in this.skills) {
        this.skills[skill] = false;
      }

      this.formations = [];
    },

    clearFormation: function () {
      this.formations = [];
    },

    async getAdress() {
      if (this.cep.length == 8) {
        let resposta = await axios.get(
          "https://viacep.com.br/ws/" + this.cep + "/json/"
        );
        var dados = resposta.data;

        if (!dados["erro"] == undefined) return false;

        this.uf = dados["uf"];
        this.city = dados["localidade"];
        this.street = dados["logradouro"];
        this.complement = dados["complemento"];
      }
    },

    saveProgrammer: function (f) {
      var p = {
        name: this.name,
        email: this.email,
        telephone: this.telephone,
        birth: this.birth,
        cep: this.cep,
        uf: this.uf,
        city: this.city,
        street: this.street,
        complement: this.complement,

        java: this.skills["java"],
        node: this.skills["node"],
        cpp: this.skills["cpp"],
        php: this.skills["php"],
        python: this.skills["python"],
        go: this.skills["go"],
        advpl: this.skills["advpl"],
        angular: this.skills["angular"],
        electron: this.skills["electron"],
        react: this.skills["react"],
        native: this.skills["native"],
        mongo: this.skills["mongo"],
        sql: this.skills["sql"],
        sqlServer: this.skills["sqlServer"],
        postgres: this.skills["postgres"],
        backend: this.skills["backend"],
        frontend: this.skills["frontend"],

        formations: f,
      };
      return p;
    },
  },
};
</script>