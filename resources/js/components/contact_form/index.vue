<template>
  <div class="container">
    <div class="loading " v-if="loading">
        <div class="lds-dual-ring"></div>
    </div>
    <form enctype="multipart/form-data" @submit.prevent="submit">
      <h2 class="text-center teste">Entre em contato</h2>
      <div class="mt-4">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <label class="text-light" for="validationTextarea">Nome:</label>
            <input
              v-model.trim="$v.message.name.$model"
              type="text"
              class="form-control"
              :class="{'is-invalid':$v.message.name.$error, 'is-valid':!$v.message.name.$invalid}"
              placeholder="Nome"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.message.name.required">Nome é obrigatório</span>
              <span v-if="!$v.message.name.alpha">Nome inválido</span>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <label class="text-light" for="validationTextarea">E-mail:</label>
            <input
              :class="{'is-invalid':$v.message.email.$error, 'is-valid':!$v.message.email.$invalid}"
              v-model.trim="$v.message.email.$model"
              type="text"
              class="form-control"
              placeholder="E-mail"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.message.email.required">Email é obrigatório</span>
              <span v-if="!$v.message.email.email">Email inválido</span>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <label class="text-light" for="validationTextarea">Telefone:</label>
            <input
              :class="{'is-invalid':$v.message.phone.$error, 'is-valid':!$v.message.phone.$invalid}"
              v-model.trim="$v.message.phone.$model"
              type="text"
              class="form-control"
              v-mask="['(##) ####-####', '(##) #####-####']"
              placeholder="Telefone"
            />
            <div class="invalid-feedback">
              <span v-if="!$v.message.phone.required">Telefone é obrigatório</span>
              <span v-if="!$v.message.phone.phone">Telefone inválido</span>
            </div>
          </div>
          <div class="col-12">
            <label class="text-light" for="validationTextarea"></label>
            <textarea
              :class="{'is-invalid':$v.message.message.$error, 'is-valid':!$v.message.message.$invalid}"
              v-model.trim="$v.message.message.$model"
              class="form-control"
              id="validationTextarea"
              placeholder="Mensagem"
              rows="5"
            ></textarea>
            <div class="invalid-feedback">
              <span v-if="!$v.message.message.required">Mensagem é obrigatória</span>
            </div>
          </div>
          <div class="col-12">
            <label class="text-light" for="validationTextarea"></label>
            <div class="custom-file">
              <input
                :class="{'is-invalid':$v.message.file.$error, 'is-valid':!$v.message.file.$invalid}"
                type="file"
                ref="file"
                class="custom-file-input text-light form-control"
                id="validatedCustomFile"
                @change="handleFileUpload()"
                accept=".pdf, .doc, .docx, .odt, .txt"
              />
              <label class="custom-file-label" for="validatedCustomFile">Selecione um arquivo...</label>
              <div class="invalid-feedback">
                <span v-if="!$v.message.file.required">Arquivo é obrigatório</span>
              </div>
            </div>
          </div>
          <div class="col-4 mt-3">
            <button type="submit" class="btn btn-info btn-md btn-block">Enviar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import validationContactForm from "../../validations/form_contact";
import EventBus from '../../eventbus'

export default {
  data() {
    return {
      loading: false,
      message: {
        name: "",
        email: "",
        phone: "",
        message: "",
        file: "",
        sender_ip: ""
      },
      formData: new FormData()
    };
  },
  created() {
    this.$store.dispatch("setIpAddress");
    EventBus.$on("close-loading", data => {
      if (data == false) this.loading = false;
    });
  },
  validations: {
    message: validationContactForm
  },
  methods: {
    submit() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        iziToast.error({
          title: "Atenção : ",
          message: "Por favor verifique os campos."
        });
      } else {
        this.confirmSubmit();
      }
    },
    confirmSubmit() {
      let vm = this;
      for (const key in this.message) {
        if (key != "file") this.formData.set(key, this.message[key]);
      }
      iziToast.question({
        timeout: false,
        close: false,
        overlay: true,
        displayMode: "once",
        id: "question",
        zindex: 999,
        position: "center",
        title: "Confirmar : ",
        message: "Deseja realmente enviar ?",
        buttons: [
          [
            "<button><b>Sim</b></button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
              vm.loading = true;
              vm.$store.dispatch("saveContact", vm.formData);
            },
            true
          ],
          [
            "<button>Não</button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            }
          ]
        ]
      });
    },
    handleFileUpload() {
      let file = this.$refs.file.files[0];
      this.$v.message.file.$model = "file";

      if (file && file.size > 50000)
        return iziToast.info({
          title: "Atenção : ",
          message: "O tamanho do arquivo não pode ultrapassar 500KB !"
        });
      if (file) {
        this.message.sender_ip = this.$store.getters.ipAddress;
        this.formData.append("file", file);

        document.querySelector(
          ".custom-file-label"
        ).innerHTML = file.name.split("\\").pop();
      }
    }
  }
};
</script>
