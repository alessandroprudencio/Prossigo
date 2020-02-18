<template>
  <div class="container">
    <input
      type="text"
      v-model="search"
      class="form-control col-5 m-2 float-right"
      placeholder="Pesquisar por nome, email ou ip"
    />
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in filterContacts" :key="item.id">
          <td>{{item.name}}</td>
          <td>{{item.email}}</td>
          <td>{{item.phone}}</td>
          <td>
            <i
              data-toggle="modal"
              :data-target="'#' + item.name.replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g,'')"
              class="fa fa-search"
            ></i>
          </td>
          <modal-details :item="item" />
        </tr>
      </tbody>
    </table>
    <pagination align="right" :data="contacts" @pagination-change-page="getResults">
      <span slot="prev-nav">&lt;</span>
      <span slot="next-nav">&gt;</span>
    </pagination>
  </div>
</template>

<script>
import { mapState } from "vuex";
import ModalDetails from "../contact_list/modalDetails";
export default {
  components: { ModalDetails },
  data() {
    return {
      search: ""
    };
  },
  methods: {
    getResults(page = 1) {
      this.$store.dispatch("loadContacts", page);
    }
  },
  mounted() {
    this.$store.dispatch("loadContacts");
  },
  computed: {
    ...mapState(["contacts"]),
    filterContacts: function() {
      return this.contacts.data.filter(contact => {
        return (
          contact.name.toLowerCase().replace('.','').match(this.search.toLowerCase().replace('.','')) ||
          contact.sender_ip.match(this.search) ||
          contact.email.match(this.search)
        );
      });
    }
  }
};
</script>

<style>
</style>