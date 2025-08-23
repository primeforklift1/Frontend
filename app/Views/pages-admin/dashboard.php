<?= $this->extend('layouts/main-admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <div style="border: 1px solid #ccc;padding:20px;border-radius:10px;">
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" aria-describedby="name">
        </div>
        <div style="height: 200px;border-radius: 0px 0px 10px 10px;" id="editor"></div>

        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
</div>
<script>
    const toolbarOptions = [
        [{
            'font': []
        }],

        ['bold', 'italic'],
        ['link'],
        ['code-block'],
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }, {
            'list': 'check'
        }],
        ['image']
    ];
    const quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    new DataTable('#example');
</script>

<?= $this->endSection() ?>