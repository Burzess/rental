<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/themes/bulma/bootstrap-table-bulma.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/themes/bulma/bootstrap-table-bulma.min.js"></script>

<table id="table" data-toggle="table" data-search="true" data-show-columns="true" data-url="json/data1.json">
    <thead>
        <tr>
            <th colspan="2">Item Detail</th>
            <th data-field="id" rowspan="2" data-valign="middle">Item ID</th>
        </tr>
        <tr>
            <th data-field="name">Item Name</th>
            <th data-field="price">Item Price</th>
        </tr>
    </thead>
</table>