<template>
  <div
    class="modal fade"
    :id="item.name.replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g,'')"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes de {{item.name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 m-2">
              <span>Nome:</span>
              <b>{{item.name}}</b>
            </div>
            <div class="col-6 m-2">
              <span>Email:</span>
              <b>{{item.email}}</b>
            </div>
            <div class="col-6 m-2">
              <span>Telefone:</span>
              <b>{{item.phone}}</b>
            </div>
            <div class="col-6 m-2">
              <span>Data de envio:</span>
              <b>{{item.created_at}}</b>
            </div>
            <div class="col-6 m-2">
              <span>Ip do remetente:</span>
              <b>{{item.sender_ip}}</b>
            </div>
            <div class="col-12 m-2">
              <span>Arquivo em anexo:</span>
              <b>
                <a target="blank" :href="'storage/'+ item.file">Clique para visualizar</a>
              </b>
            </div>
            <div class="col-12 m-2">
              <span>Mensagem:</span>
              <b>{{item.message}}</b>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: Object
  }
};
</script>