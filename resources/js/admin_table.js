if (document.querySelector('#admin-rooms-table')) {
    $(document).ready(function() {
        $('#admin-rooms-table').DataTable();
        let add_new_btn = document.createElement('button');
        add_new_btn.id = 'btn-new-room';
        add_new_btn.type = 'button';
        add_new_btn.classList.add('btn', 'btn-outline-success', 'ml-3', 'btn-datatable-add');
        add_new_btn.setAttribute('data-toggle', 'modal');
        add_new_btn.setAttribute('data-target', '#modal-new-room');
        add_new_btn.innerHTML = `<i class="fas fa-plus mr-3"></i>Aggiungi camera`;
        add_new_btn.addEventListener('click', function() {
            document.querySelector('#modal-new-room-code').value = '';
            document.querySelector('#modal-new-room-model').value = '';
            document.querySelector('#modal-new-room-description').value = '';
            document.querySelector('#modal-new-room-price').value = '';
            document.querySelector('#modal-new-room-floor').value = '';
            document.querySelector('#modal-new-room-adults').value = '';
            document.querySelector('#modal-new-room-children').value = '';
            document.querySelector('#modal-new-room-baths').value = '';
            document.querySelector('#modal-new-room-jacuzzi').checked = false;
            document.querySelector('#modal-new-room-shower').checked = false;
            document.querySelector('#modal-new-room-balcony').checked = false;
            document.querySelector('#modal-new-room-active').checked = false;
        });
        document.querySelector('#admin-rooms-table_filter').appendChild(add_new_btn);

        let btn_clone_arr = document.querySelectorAll('#btn-clone');
        btn_clone_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelector('#modal-new-room-code').value = rooms[this.getAttribute('room-id')].code;
                document.querySelector('#modal-new-room-model').value = rooms[this.getAttribute('room-id')].model;
                document.querySelector('#modal-new-room-description').value = rooms[this.getAttribute('room-id')].description;
                document.querySelector('#modal-new-room-price').value = rooms[this.getAttribute('room-id')].price;
                document.querySelector('#modal-new-room-floor').value = rooms[this.getAttribute('room-id')].floor;
                document.querySelector('#modal-new-room-adults').value = rooms[this.getAttribute('room-id')].n_adults;
                document.querySelector('#modal-new-room-children').value = rooms[this.getAttribute('room-id')].n_children;
                document.querySelector('#modal-new-room-baths').value = rooms[this.getAttribute('room-id')].n_baths;
                document.querySelector('#modal-new-room-jacuzzi').checked = rooms[this.getAttribute('room-id')].jacuzzi;
                document.querySelector('#modal-new-room-shower').checked = rooms[this.getAttribute('room-id')].shower;
                document.querySelector('#modal-new-room-balcony').checked = rooms[this.getAttribute('room-id')].balcony;
                document.querySelector('#modal-new-room-active').checked = rooms[this.getAttribute('room-id')].active;
            });
        });

        let btn_edit_arr = document.querySelectorAll('#btn-edit');
        let modal_edit = document.querySelector('#modal-edit-room-form');
        btn_edit_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                modal_edit.setAttribute('action', modal_edit.getAttribute('route').replace('roomid', this.getAttribute('room-id')));
                document.querySelector('#modal-edit-room-code').value = rooms[this.getAttribute('room-id')].code;
                document.querySelector('#modal-edit-room-model').value = rooms[this.getAttribute('room-id')].model;
                document.querySelector('#modal-edit-room-description').value = rooms[this.getAttribute('room-id')].description;
                document.querySelector('#modal-edit-room-price').value = rooms[this.getAttribute('room-id')].price;
                document.querySelector('#modal-edit-room-floor').value = rooms[this.getAttribute('room-id')].floor;
                document.querySelector('#modal-edit-room-adults').value = rooms[this.getAttribute('room-id')].n_adults;
                document.querySelector('#modal-edit-room-children').value = rooms[this.getAttribute('room-id')].n_children;
                document.querySelector('#modal-edit-room-baths').value = rooms[this.getAttribute('room-id')].n_baths;
                document.querySelector('#modal-edit-room-jacuzzi').checked = rooms[this.getAttribute('room-id')].jacuzzi;
                document.querySelector('#modal-edit-room-shower').checked = rooms[this.getAttribute('room-id')].shower;
                document.querySelector('#modal-edit-room-balcony').checked = rooms[this.getAttribute('room-id')].balcony;
                document.querySelector('#modal-edit-room-active').checked = rooms[this.getAttribute('room-id')].active;
            });
        });

        let btn_delete_arr = document.querySelectorAll('#btn-delete');
        let modal_delete = document.querySelector('#modal-delete-room-form');
        btn_delete_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                modal_delete.setAttribute('action', modal_delete.getAttribute('route').replace('roomid', this.getAttribute('room-id')));
                document.querySelector('#modal-delete-room-code').innerHTML = rooms[this.getAttribute('room-id')].code;
                document.querySelector('#modal-delete-room-model').innerHTML = rooms[this.getAttribute('room-id')].model;
                document.querySelector('#modal-delete-room-description').innerHTML = rooms[this.getAttribute('room-id')].description;
                document.querySelector('#modal-delete-room-price').innerHTML = rooms[this.getAttribute('room-id')].price;
                if (rooms[this.getAttribute('room-id')].floor != 0) {
                    document.querySelector('#modal-delete-room-floor').innerHTML = rooms[this.getAttribute('room-id')].floor;
                } else {
                    document.querySelector('#modal-delete-room-floor').innerHTML = 'T';
                }
                document.querySelector('#modal-delete-room-adults').innerHTML = rooms[this.getAttribute('room-id')].n_adults;
                document.querySelector('#modal-delete-room-children').innerHTML = rooms[this.getAttribute('room-id')].n_children;
                document.querySelector('#modal-delete-room-baths').innerHTML = rooms[this.getAttribute('room-id')].n_baths;
                if (rooms[this.getAttribute('room-id')].jacuzzi) {
                    document.querySelector('#modal-delete-room-jacuzzi').innerHTML = `<i class="fas fa-check text-success"></i>`;
                } else {
                    document.querySelector('#modal-delete-room-jacuzzi').innerHTML = `<i class="fas fa-times text-danger"></i>`;
                }
                if (rooms[this.getAttribute('room-id')].shower) {
                    document.querySelector('#modal-delete-room-shower').innerHTML = `<i class="fas fa-check text-success"></i>`;
                } else {
                    document.querySelector('#modal-delete-room-shower').innerHTML = `<i class="fas fa-times text-danger"></i>`;
                }
                if (rooms[this.getAttribute('room-id')].balcony) {
                    document.querySelector('#modal-delete-room-balcony').innerHTML = `<i class="fas fa-check text-success"></i>`;
                } else {
                    document.querySelector('#modal-delete-room-balcony').innerHTML = `<i class="fas fa-times text-danger"></i>`;
                }
                if (rooms[this.getAttribute('room-id')].active) {
                    document.querySelector('#modal-delete-room-active').innerHTML = `<i class="fas fa-check text-success"></i>`;
                } else {
                    document.querySelector('#modal-delete-room-active').innerHTML = `<i class="fas fa-times text-danger"></i>`;
                }
            });
        });
    });
}

if (document.querySelector('#admin-plans-table')) {
    $(document).ready(function() {
        $('#admin-plans-table').DataTable();
        let add_new_btn = document.createElement('button');
        add_new_btn.id = 'btn-new-plan';
        add_new_btn.type = 'button';
        add_new_btn.classList.add('btn', 'btn-outline-success', 'ml-3', 'btn-datatable-add');
        add_new_btn.setAttribute('data-toggle', 'modal');
        add_new_btn.setAttribute('data-target', '#modal-new-plan');
        add_new_btn.innerHTML = `<i class="fas fa-plus mr-3"></i>Aggiungi convenzione`;
        add_new_btn.addEventListener('click', function() {
            document.querySelector('#modal-new-plan-name').value = '';
            document.querySelector('#modal-new-plan-description').value = '';
            document.querySelector('#modal-new-plan-price').value = '';
        });
        document.querySelector('#admin-plans-table_filter').appendChild(add_new_btn);

        let btn_clone_arr = document.querySelectorAll('#btn-clone');
        btn_clone_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelector('#modal-new-plan-name').value = plans[this.getAttribute('plan-id')].name;
                document.querySelector('#modal-new-plan-description').value = plans[this.getAttribute('plan-id')].description;
                document.querySelector('#modal-new-plan-price').value = plans[this.getAttribute('plan-id')].price;
            });
        });

        let btn_edit_arr = document.querySelectorAll('#btn-edit');
        let modal_edit = document.querySelector('#modal-edit-plan-form');
        btn_edit_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                modal_edit.setAttribute('action', modal_edit.getAttribute('route').replace('planid', this.getAttribute('plan-id')));
                document.querySelector('#modal-edit-plan-name').value = plans[this.getAttribute('plan-id')].name;
                document.querySelector('#modal-edit-plan-description').value = plans[this.getAttribute('plan-id')].description;
                document.querySelector('#modal-edit-plan-price').value = plans[this.getAttribute('plan-id')].price;
            });
        });

        let btn_delete_arr = document.querySelectorAll('#btn-delete');
        let modal_delete = document.querySelector('#modal-delete-plan-form');
        btn_delete_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                modal_delete.setAttribute('action', modal_delete.getAttribute('route').replace('planid', this.getAttribute('plan-id')));
                document.querySelector('#modal-delete-plan-name').innerHTML = plans[this.getAttribute('plan-id')].name;
                document.querySelector('#modal-delete-plan-description').innerHTML = plans[this.getAttribute('plan-id')].description;
                document.querySelector('#modal-delete-plan-price').innerHTML = plans[this.getAttribute('plan-id')].price;
            });
        });
    });
}

if (document.querySelector('#admin-users-table')) {
    $(document).ready(function() {
        $('#admin-users-table').DataTable();

        users.forEach(user => {
            date = user.created_at.substring(0, 10).split('-');
            user.created_at = date[2] + '-' + date[1] + '-' + date[0];
        });

        let btn_edit_arr = document.querySelectorAll('#btn-edit');
        let btn_edit_submit = document.querySelector('#modal-edit-user-submit');
        btn_edit_arr.forEach(btn => {
            btn.addEventListener('click', function() {
                btn_edit_submit.setAttribute('href', btn_edit_submit.getAttribute('route').replace('userid', this.getAttribute('user-id')));
                document.querySelector('#modal-edit-user-name').innerHTML = users[this.getAttribute('user-id')].name;
                document.querySelector('#modal-edit-user-email').innerHTML = users[this.getAttribute('user-id')].email;
                document.querySelector('#modal-edit-user-createdat').innerHTML = users[this.getAttribute('user-id')].created_at;
                if (users[this.getAttribute('user-id')].role == 'admin') {
                    document.querySelector('#modal-edit-user-admin').innerHTML = `<i class="fas fa-check text-success"></i>`;
                    document.querySelector('#modal-edit-user-label').innerHTML = 'Disabilita utente';
                    document.querySelector('#modal-edit-user-prompt').innerHTML = 'Sei sicuro di volere disabilitare il seguente utente?';
                    document.querySelector('#modal-edit-user-prompt').classList.remove('text-info');
                    document.querySelector('#modal-edit-user-prompt').classList.add('text-danger');
                    btn_edit_submit.innerHTML = 'Disabilita';
                    btn_edit_submit.classList.remove('btn-info');
                    btn_edit_submit.classList.add('btn-danger');
                } else {
                    document.querySelector('#modal-edit-user-admin').innerHTML = `<i class="fas fa-times text-danger"></i>`;
                    document.querySelector('#modal-edit-user-label').innerHTML = 'Abilita utente';
                    document.querySelector('#modal-edit-user-prompt').innerHTML = 'Sei sicuro di volere abilitare il seguente utente?';
                    document.querySelector('#modal-edit-user-prompt').classList.remove('text-danger');
                    document.querySelector('#modal-edit-user-prompt').classList.add('text-info');
                    btn_edit_submit.innerHTML = 'Abilita';
                    btn_edit_submit.classList.remove('btn-danger');
                    btn_edit_submit.classList.add('btn-info');
                }
            });
        });
    });
}