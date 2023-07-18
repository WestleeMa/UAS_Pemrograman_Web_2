<!-- Modal -->
<div class="modal fade" id="inimodalpesan" tabindex="-1" aria-labelledby="inimodalLabel" aria-hidden="true"
    data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="inimodalLabel">
                    <p id="judulmodalPesan">Balas Pesan</p>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="msgForm" enctype="multipart/form-data">
                    <input type="hidden" id="hidden-id" name="msg_id">
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Nama">Nama Pengirim <small>(read-only)</small></label>
                        <input type="text" name="Nama" id="Nama" class="form-control form-control" readonly/>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Pesan">Pesan <small>(read-only)</small></label>
                        <textarea name="Pesan" id="Pesan" cols="30" rows="5" class="form-control form-control"readonly></textarea>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Balasan">Balasan</label>
                        <textarea name="Balasan" id="Balasan" cols="30" rows="5" class="form-control form-control" ></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modalOK">Balas</button>
            </div>
        </div>
    </div>
</div>