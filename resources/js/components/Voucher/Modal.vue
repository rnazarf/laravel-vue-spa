<template>
  <div
    class="modal"
    id="formModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modal-default"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">Form Voucher : {{ dataVoucher.name }}</h2>
          <button
            type="button"
            class="btn-close"
            @click="closeModal"
            aria-label="Close"
          ></button>
        </div>
        <form
          @submit.prevent="isEdit ? updateAction() : createAction()"
          autocomplete="off"
        >
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group mb-1">
                  <label for="name">Name</label>
                  <input
                    v-model="dataVoucher.name"
                    type="text"
                    class="form-control"
                    placeholder="Voucher Name"
                    id="name"
                    name="name"
                    autofocus
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group mb-1">
                  <label for="description">Description</label>
                  <textarea
                    v-model="dataVoucher.description"
                    type="description"
                    class="form-control"
                    placeholder="Lorem ipsum dolor sit amet"
                    id="description"
                    name="description"
                    :class="{
                      'is-invalid': form.errors.has('description'),
                    }"
                  >
                  </textarea>
                  <has-error :form="form" field="description"></has-error>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mb-1">
                  <label for="voucher_code">Voucher Code</label>
                  <input
                    v-model="dataVoucher.voucher_code"
                    type="text"
                    class="form-control"
                    placeholder="Voucher Code"
                    id="voucher_code"
                    name="voucher_code"
                    autofocus
                    :class="{
                      'is-invalid': form.errors.has('voucher_code'),
                    }"
                  />
                  <has-error :form="form" field="voucher_code"></has-error>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-1">
                  <label for="status">Status</label>
                  <select
                    v-model="dataVoucher.status"
                    name="status"
                    id="status"
                    class="form-select"
                    :class="{ 'is-invalid': form.errors.has('status') }"
                  >
                    <option value="N">Tidak Aktif</option>
                    <option value="Y">Aktif</option>
                  </select>
                  <has-error :form="form" field="status"></has-error>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mb-1">
                  <label for="type_voucher">Type Voucher</label>
                  <select
                    v-model="dataVoucher.type_voucher"
                    name="type_voucher"
                    id="type_voucher"
                    class="form-select"
                    :class="{ 'is-invalid': form.errors.has('type_voucher') }"
                  >
                    <option value="Percent">Percent</option>
                    <option value="Money">Money</option>
                  </select>
                  <has-error :form="form" field="type_voucher"></has-error>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-1">
                  <label for="value">Value</label>
                  <input
                    v-model="dataVoucher.value"
                    type="number"
                    class="form-control"
                    placeholder="Value"
                    id="value"
                    name="value"
                    autofocus
                    :class="{ 'is-invalid': form.errors.has('value') }"
                  />
                  <has-error :form="form" field="value"></has-error>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">
              {{ isEdit ? "Update" : "Create" }}
            </button>
            <button
              type="button"
              class="btn btn-link text-gray-600 ms-auto"
              @click="closeModal"
            >
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "modal",
  props: {
    isEdit: {
      type: Boolean,
      default: false,
    },
    dataVoucher: {
      id: {
        type: Number,
        default: 0,
      },
      name: {
        type: String,
        default: "",
      },
      description: {
        type: String,
        default: "",
      },
      voucher_code: {
        type: String,
        default: "",
      },
      status: {
        type: String,
        default: "N",
      },
      type_voucher: {
        type: String,
        default: "Percent",
      },
      value: {
        type: Number,
        default: 0,
      },
    },
  },
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        description: "",
        voucher_code: "",
        status: "N",
        type_voucher: "Percent",
        value: 0,
      }),
    };
  },
  methods: {
    clearForm() {
      this.form.reset();
      this.form.errors.clear();
    },
    closeModal() {
      this.clearForm();
      this.$emit("close-modal");
    },
    createAction() {
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataVoucher);

      this.form
        .post("api/v1/voucher")
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data", 1, true);
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      this.$Progress.finish();
    },
    updateAction() {
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataVoucher);

      this.form
        .put("api/v1/voucher/" + this.form.id)
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data");
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
  },
};
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: block;
  /* overflow: hidden; */
  outline: 0;
  background-color: rgba(0, 0, 0, 0.6);
  transition: opacity 0.15s linear;
}
</style>