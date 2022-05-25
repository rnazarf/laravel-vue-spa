<template>
  <div
    ref="modal"
    class="modal"
    id="formModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modal-default"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">Form Bank</h2>
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
          enctype="multipart/form-data"
        >
          <div class="modal-body">
            <div class="form-group mb-1">
              <label for="name">Name</label>
              <input
                v-model="dataBank.name"
                type="text"
                class="form-control"
                placeholder="Bank Name"
                id="name"
                name="name"
                autofocus
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="account_number">Account Number</label>
              <input
                v-model="dataBank.account_number"
                type="number"
                class="form-control"
                placeholder="Account Number"
                id="account_number"
                name="account_number"
                autofocus
                :class="{ 'is-invalid': form.errors.has('account_number') }"
              />
              <has-error :form="form" field="account_number"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="description">Description</label>
              <textarea
                v-model="dataBank.description"
                class="form-control"
                placeholder="Lorem ipsum dolor sit amet"
                id="description"
                name="description"
                :class="{ 'is-invalid': form.errors.has('description') }"
              >
              </textarea>
              <has-error :form="form" field="description"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="description">Logo</label>
              <input
                ref="logoInput"
                class="form-control"
                type="file"
                name="logo"
                @change="handleFile"
                :class="{ 'is-invalid': form.errors.has('logo') }"
              />
              <has-error :form="form" field="logo"></has-error>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-secondary"
              :disabled="disabled"
            >
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
const objectToFormData = require("object-to-formdata");

export default {
  name: "modal",
  props: {
    isEdit: {
      type: Boolean,
      default: false,
    },
    isModalVisible: {
      type: Boolean,
      default: false,
    },
    dataBank: {
      id: {
        type: Number,
      },
      account_number: {
        type: Number,
      },
      name: {
        type: String,
      },
      description: {
        type: String,
      },
      logo: {
        type: String,
      },
    },
  },
  data() {
    return {
      disabled: false,
      form: new Form({
        id: "",
        account_number: "",
        name: "",
        description: "",
        logo: "",
      }),
    };
  },
  mounted() {},
  methods: {
    handleFile(event) {
      const file = event.target.files[0];
      this.dataBank.logo = file;
    },
    clearForm() {
      this.form.reset();
      this.form.errors.clear();
    },
    closeModal() {
      this.$refs.logoInput.value = null;
      this.$emit("close-modal");
    },
    createAction() {
      this.disabled = true;
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataBank);

      this.form
        .submit("post", "api/v1/bank", {
          // Transform form data to FormData
          transformRequest: [
            function (data, headers) {
              return objectToFormData(data);
            },
          ],

          onUploadProgress: (e) => {
            // Do whatever you want with the progress event
            // console.log(e)
          },
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$refs.logoInput.value = null;
          this.$emit("refresh-data", 1, true);
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        })
        .finally(() => {
          this.disabled = false;
          this.$Progress.finish();
        });
    },
    updateAction() {
      this.disabled = true;

      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataBank);

      this.form
        .submit("post", "api/v1/bank/" + this.form.id, {
          // Transform form data to FormData
          transformRequest: [
            function (data, headers) {
              data["_method"] = "PUT";
              return objectToFormData(data);
            },
          ],

          onUploadProgress: (e) => {
            // Do whatever you want with the progress event
            // console.log(e)
          },
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$refs.logoInput.value = null;
          this.$emit("refresh-data");
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        })
        .finally(() => {
          this.disabled = false;
          this.$Progress.finish();
        });
    },
  },
};
</script>