<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-bold text-black dark:text-white text-2xl">Edit Items</h2>
                <p class="font-medium">Management / Items</p>
            </div>
            <div class="rounded-sm border shadow-sm bg-white px-5 pb-2.5 pt-6 sm:px-7 xl:pb-1">
                <div class="flex flex-col">
                    <div class="border-b border-stroke px-6 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-xl text-black dark:text-white">Masukan data items</h3>
                    </div>
                    <form action="/modal/items/update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="p-6">
                            <div class="mb-4">
                                <label for="nama" class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Items</label>
                                <input required type="text" name="nama" value="{{ $item->nama }}" placeholder="Masukan Nama Tugas" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">
                            </div>
                            <div class="mb-4">
                                <label for="keterangan" class="mb-3 block text-sm font-medium text-black dark:text-white">Keterangan</label>
                                <textarea required type="text" name="keterangan" placeholder="Keterangan Tugas" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">{{ $item->keterangan }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="dateRange" class="mb-3 block text-sm font-medium text-black dark:text-white">Timeline</label>
                                <input type="text" name="dateRange" id="dateRange" value="" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700" required>
                            </div>
                            <div class="mb-4">
                                <label for="anggota" class="mb-3 block text-sm font-medium text-black dark:text-white">Masukan petugas</label>
                                <input type="text" name="anggota" value="{{ $item->petugas }}" placeholder="Masukan nama petugas" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700" required>
                            </div>
                            <div class="mb-4">
                                <label for="upload" class="mb-3 block text-sm font-medium text-black dark:text-white">Masukan file</label>
                                <input type="file" name="upload" placeholder="choose file" class="w-full cursor-pointer rounded-lg border-[1.5px] bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:bg-white file:px-5 file:py-3 file:hover:bg-blue-700 file:hover:bg-opacity-10 focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:file:bg-white/30 dark:file:text-white dark:focus:border-blue-700">
                            </div>
                            <button class="mt-10 flex w-full justify-center rounded bg-blue-700 p-3 font-medium text-white hover:bg-opacity-90">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('input[name="dateRange"]').daterangepicker({
            opens: 'right',
            startDate: '{{ $item->waktuMulai }}',
            endDate: '{{ $item->waktuSelesai }}'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var input = document.querySelectorAll('input[name=anggota]');
        var i = 0
        var members = [
            @foreach ($member as $m)
                {"value": i++, "name": "{{ $m->w_anggota }}"},
            @endforeach
        ];
        
        function getMembers() {
            return members.map(member => ({
                value: member.name,
                name: member.value
            }));
        }

        input.forEach(inp=>{
            var tagify = new Tagify(inp, {
                whitelist: getMembers(),
                enforceWhitelist: true,
                maxTags: 1,
                dropdown: {
                    maxItems: 100,           // maximum items to show in the dropdown
                    classname: "members-list",
                    enabled: 0,              // always show dropdown
                    closeOnSelect: false    // keep the dropdown open after selecting a suggestion
                }
            });

            // listen to "input" event to filter whitelist
            tagify.on('input', onInput);

            function onInput(e) {
            var value = e.detail.name.toLowerCase();
            var filteredMembers = members.filter(member => member.name.toLowerCase().includes(value));
            tagify.settings.whitelist = filteredMembers;
            tagify.dropdown.show.call(tagify, value); // render the suggestions dropdown
        }
        });
        

        
    });
</script>
<x-foot></x-foot>