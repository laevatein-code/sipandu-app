$('input[name="dateRange"]').daterangepicker();

document.getElementById("addTable").addEventListener('click', function(){
    try {
        document.getElementById('tableBody').prop;
        window.alert("Task terbaru belum disimpan");
    } catch (error) {
        const container = document.getElementById('tableContainer');
        const div1 = document.createElement('div');
        div1.className = 'container mx-auto space-y-8 py-4';
        const div2 = document.createElement('div');
        div2.className = 'pb-0 text-lg font-semibold text-left rtl:text-right text-gray-900';
        const p = document.createElement('p');
        p.contentEditable = 'true';
        p.innerHTML = 'To Do';
        div2.appendChild(p);

        const div3 = document.createElement('div');
        div3.className = 'overflow-x-auto mb-4';
        
        div3.innerHTML = '<table id="dynamicTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow"><thead class="bg-gray-200"><tr id="tableHeader"><th class="p-2 border border-gray-300 cursor-pointer text-left">Nama Tugas</th><th class="p-2 border border-gray-300 cursor-pointer text-left">Anggota</th><th class="p-2 border border-gray-300 cursor-pointer text-left">Status</th><th class="p-2 border border-gray-300 cursor-pointer text-left">Tenggat Waktu</th><th class="p-2 border border-gray-300 cursor-pointer text-left">Files</th><th class="p-2 border border-gray-300 cursor-pointer text-left">Actions</th></tr></thead><tbody id="tableBody"><tr><td class="p-2 border border-gray-300 editable-cell">New Text</td><td class="p-2 border border-gray-300 editable-cell">New Text</td><td class="p-2 border border-gray-300 editable-cell"><select class="bg-white border border-gray-300 rounded px-2 py-1"><option value="Not Started" selected="selected">Not Started</option><option value="In Progress">In Progress</option><option value="Completed">Completed</option></select></td><td class="p-2 border border-gray-300 editable-cell"><input type="text" name="dateRange" class="bg-white border border-gray-300 rounded px-2 py-1"></td><td class="p-2 border border-gray-300 editable-cell"><input type="file" name="filesUpload" class="bg-white border border-gray-300 rounded px-2 py-1"></td><td class="p-2 border border-gray-300 text-center"><button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button></td></tr></tbody></table>';

        const div4 = document.createElement('div');
        div4.className = 'flex space-x-4';

        const tombol = document.createElement('button');
        tombol.className = 'bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700';
        tombol.id = 'addRow';
        tombol.innerHTML = 'Add Row';

        div4.appendChild(tombol);

        div1.appendChild(div2);
        div1.appendChild(div3);
        div1.appendChild(div4);
        container.appendChild(div1);

        document.getElementById('addRow').addEventListener('click', function() { 
            const tableBody = document.getElementById('tableBody');
            const newRow = document.createElement('tr');
            const numColumns = document.querySelectorAll('#tableHeader th').length;
        
            for (let i = 0; i < numColumns; i++) {
                const newCell = document.createElement('td');
                newCell.className = 'p-2 border border-gray-300 editable-cell';
                if (i === 2) {
                    newCell.innerHTML = '<select class="bg-white border border-gray-300 rounded px-2 py-1">' +
                                        '<option value="Not Started">Not Started</option>' +
                                        '<option value="In Progress">In Progress</option>' +
                                        '<option value="Completed">Completed</option>';
                } else if (i === 3) {
                    newCell.innerHTML = '<input type="text" name="dateRange" class="bg-white border border-gray-300 rounded px-2 py-1">';
                } else if (i === 4) {
                    newCell.innerHTML ='<input type="file" name="filesUpload" class="bg-white border border-gray-300 rounded px-2 py-1">';
                } else if (i === 5) {
                    newCell.className = 'p-2 border border-gray-300 editable-cell text-center';
                    newCell.innerHTML = '<button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button>';
                } else {
                    newCell.textContent = `New Data`;
                }
                newRow.appendChild(newCell);
            }
        
            tableBody.appendChild(newRow);
            attachCellClickHandler(newRow);
            attachDeleteRowHandler(newRow);
        
            $('input[name="dateRange"]').daterangepicker();
        });
        
        $('input[name="dateRange"]').daterangepicker();
        document.querySelectorAll('#tableBody tr').forEach(row => {
            attachCellClickHandler(row);
            attachDeleteRowHandler(row);
            
        });
    }
    
});

function attachCellClickHandler(row) {
    row.querySelectorAll('.editable-cell').forEach(cell => {
        cell.addEventListener('click', function() {
            if (cell.querySelector('input') || cell.querySelector('select') || cell.querySelector('button')) return;

            const currentText = cell.textContent;
            const input = document.createElement('input');
            input.type = 'text';
            input.value = currentText;
            input.className = 'border rounded p-1';
            cell.textContent = '';
            cell.appendChild(input);
            input.focus();

            const finishEditing = () => {
                const newText = input.value.trim() || currentText;
                cell.textContent = newText;
            };

            input.addEventListener('blur', finishEditing);
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    finishEditing();
                }
            });
        });
    });
}

function attachDeleteRowHandler(row) {
    row.querySelectorAll('.delete-row').forEach(button => {
        button.addEventListener('click', function() {
            row.remove();
        });
    });
}

