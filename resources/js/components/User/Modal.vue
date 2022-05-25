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
          <h2 class="h6 modal-title">Form User</h2>
          <button
            type="button"
            class="btn-close"
            @click="closeModal"
            aria-label="Close"
          ></button>
        </div>
        <form @submit.prevent="isEdit ? updateAction() : createAction()">
          <div class="modal-body">
            <!-- Form -->
            <div class="form-group mb-1">
              <label for="name">Name</label>

              <input
                v-model="dataUser.name"
                type="text"
                class="form-control"
                placeholder="John Doe"
                id="name"
                name="name"
                autofocus
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <!-- End of Form -->
            <!-- Form -->
            <div class="form-group mb-1">
              <label for="email">Email</label>
              <input
                v-model="dataUser.email"
                type="email"
                class="form-control"
                placeholder="example@company.com"
                id="email"
                name="email"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
            </div>
            <!-- End of Form -->
            <div class="form-group">
              <!-- Form -->
              <div class="form-group mb-1">
                <label for="password">Password</label>
                <input
                  v-model="dataUser.password"
                  type="password"
                  placeholder="Password"
                  class="form-control"
                  id="password"
                  name="password"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
              <!-- End of Form -->
              <!-- Form -->
              <div class="form-group mb-1">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-group">
                  <input
                    v-model="dataUser.password_confirmation"
                    type="password"
                    placeholder="Confirm Password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                  />
                  <has-error
                    :form="form"
                    field="password_confirmation"
                  ></has-error>
                </div>
              </div>
              <!-- End of Form -->
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
export default {
  name: "modal",
  props: {
    isEdit: {
      type: Boolean,
      default: false,
    },
    dataUser: {
      id: {
        type: Number,
        default: 0,
      },
      name: {
        type: String,
        default: "",
      },
      email: {
        type: String,
        default: "",
      },
      password: {
        type: String,
        default: "",
      },
      password_confirmation: {
        type: String,
        default: "",
      },
    },
  },
  data() {
    return {
      disabled: false,
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
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
      this.disabled = true;
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataUser);

      this.form
        .post("api/v1/user")
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
      this.form.fill(this.dataUser);

      this.form
        .put("api/v1/user/" + this.form.id)
        .then((response) => {
          // success

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
        })
        .finally(() => {
          this.disabled = false;
          this.$Progress.finish();
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