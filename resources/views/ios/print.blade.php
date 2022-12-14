<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
    <style>
        body {

        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        #page[data-size="A4"] {
            width: 21cm;
            height: 29.7cm;
            background:
                linear-gradient(-90deg, rgba(0,0,0,.05) 1px, transparent 1px),
                linear-gradient(rgba(0,0,0,.05) 1px, transparent 1px),
                linear-gradient(-90deg, rgba(0, 0, 0, .04) 1px, transparent 1px),
                linear-gradient(rgba(0,0,0,.04) 1px, transparent 1px),
                linear-gradient(transparent 3px, #f2f2f2 3px, #f2f2f2 78px, transparent 78px),
                linear-gradient(-90deg, #aaa 1px, transparent 1px),
                linear-gradient(-90deg, transparent 3px, #f2f2f2 3px, #f2f2f2 78px, transparent 78px),
                linear-gradient(#aaa 1px, transparent 1px),
                #f2f2f2;
            background-size:
                10px 10px,
                10px 10px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px,
                80px 80px;
        }

        .draggable {
            position: absolute;
        }

        header > section {
            width: 21cm;
        }

        @media print {
            section, header {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-900">

<header class="mb-5">
    <section class="bg-gray-200 mx-auto flex justify-between items-center p-2 border-b-2 border-l-2 border-r-2
        border-gray-400 rounded-bl rounded-br">
        <div x-data="{ show: false }" class="flex items-center space-x-3">
            <button id="print" class="flex space-x-1 items-center bg-blue-500 text-white py-1 px-4 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>

                <span>Print</span>
            </button>

            <button @click="show = !show" class="flex space-x-1 items-center bg-orange-500
                text-white py-1 px-4
                rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>

                <span>Add Element</span>
            </button>

            <div x-show="show" style="display: none" class="relative z-10" aria-labelledby="modal-title"
                 role="dialog"
                 aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900"
                                            id="modal-title">Add Element</h3>
                                        <div class="mt-2">
                                            <div class="space-y-2">
                                                <div>
                                                    <label for="">Text Content</label>
                                                    <input id="textContent" type="text" class="text-field w-72">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button @click="show = false" id="add-element" type="button" class="inline-flex
                                    w-full
                                    justify-center
                                    rounded-md border
                                    border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white
                                    shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-red-500
                                    focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Add</button>
                                <button @click="show = false" type="button" class="mt-3 inline-flex w-full
                                    justify-center
                                    rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex space-x-1">
            <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-white bg-gray-900 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        X
                      </span>
                <input type="text" id="x-pos" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-44 text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="X Position">
            </div>
            <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-white bg-gray-900 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        Y
                      </span>
                <input type="text" id="y-pos" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-44 text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Y Position">
            </div>
            <button id="save" class="bg-green-500 text-white py-1 px-4 rounded font-semibold">SAVE</button>
        </div>
    </section>
</header>

<div id="details"
     style="display: none"
     data-io-number="{{ $io->io_number }}"
     data-processed-at="{{ $io->processed_at }}"
     data-io-to="{{ $certificate->applicant->fullname() }}"
     data-proceed="{{ $io->proceed }}"
     data-purpose="{{ $io->purpose }}"
     data-duration="{{ $io->duration }}"
     data-remarks="{{ $io->remarks }}"
     data-chief="{{ $io->chief }}"
     data-marshal="{{ $certificate->marshal }}"
>
</div>

<div id="page" class="bg-white relative mx-auto justify-between outline outline-gray-400 box-border"
     data-size="A4"></div>

<script>
    let active;
    const page = document.getElementById('page');
    let xPos = document.getElementById('x-pos');
    let yPos = document.getElementById('y-pos');
    const save = document.getElementById('save');
    const add = document.getElementById('add-element');
    const print = document.getElementById('print');
    let newId = document.getElementById('newId');
    let textContent = document.getElementById('textContent');
    const details = document.getElementById('details').dataset;
    const elements = JSON.parse(JSON.stringify(details));

    const positions = {
        applicant: {
            x: '325px',
            y: '325px'
        }
    }

    for (const element in elements) {
        const item = document.createElement('div');
        item.id = element;
        item.classList.add('draggable', 'ui-widget-content', 'whitespace-nowrap', 'cursor-move');
        item.innerText = elements[element];

        page.append(item);

        $(() => {
            $('#' + element).draggable({
                containment: '#page',
                scroll: false,
                start: (e) => {
                    active = e.target;
                },
                drag: (e) => {
                    xPos.value = Math.round(e.target.getBoundingClientRect().left - page.getBoundingClientRect().left);
                    yPos.value = Math.round(e.target.getBoundingClientRect().top - page.getBoundingClientRect().top);
                }
            });
        });

        item.addEventListener('click', () => {
            active = item;
            xPos.value = Math.round(active.getBoundingClientRect().left - page.getBoundingClientRect().left);
            yPos.value = Math.round(active.getBoundingClientRect().top - page.getBoundingClientRect().top);
            console.log(item);
        });
    }

    if (document.getElementById('processedAt')) {
        let processedAt = document.getElementById('processedAt');
        processedAt.style.top = '220px';
        processedAt.style.left = '550px';
    }

    if (document.getElementById('ioNumber')) {
        let ioNumber = document.getElementById('ioNumber');
        ioNumber.style.top = '250px';
        ioNumber.style.left = '120px';
    }

    if (document.getElementById('ioTo')) {
        let ioTo = document.getElementById('ioTo');
        ioTo.style.top = '330px';
        ioTo.style.left = '290px';
    }

    if (document.getElementById('proceed')) {
        let proceed = document.getElementById('proceed');
        proceed.style.top = '380px';
        proceed.style.left = '290px';
    }

    if (document.getElementById('purpose')) {
        let purpose = document.getElementById('purpose');
        purpose.style.top = '430px';
        purpose.style.left = '290px';
    }

    if (document.getElementById('duration')) {
        let duration = document.getElementById('duration');
        duration.style.top = '480px';
        duration.style.left = '290px';
    }

    if (document.getElementById('remarks')) {
        let remarks = document.getElementById('remarks');
        remarks.style.top = '530px';
        remarks.style.left = '290px';
    }

    if (document.getElementById('chief')) {
        let chief = document.getElementById('chief');
        chief.style.top = '680px';
        chief.style.left = '80px';
    }

    if (document.getElementById('marshal')) {
        let marshal = document.getElementById('marshal');
        marshal.style.top = '680px';
        marshal.style.left = '480px';
    }

    function formatDate(element) {
        let year = new Date(element).getFullYear();
        let month = new Date(element).getMonth();
        let date = new Date(element).getDate();

        return year + '-' + month + '-' + date
    }

    xPos.addEventListener('keydown', () => {
        active.style.left = xPos.value + 'px';
    });

    xPos.addEventListener('keyup', () => {
        active.style.left = xPos.value + 'px';
    });

    yPos.addEventListener('keydown', () => {
        active.style.top = yPos.value + 'px';
    });

    yPos.addEventListener('keyup', () => {
        active.style.top = yPos.value + 'px';
    });

    save.addEventListener('click', () => {
        let id = active.id;
        // active.style.top = yPos.value + 'px';
        // active.style.left = xPos.value + 'px';
        // console.log(id);
        // console.log(positions[id].x);
        positions[id].x = xPos.value;
        positions[id].y = yPos.value;
    });

    print.addEventListener('click', () => {
        window.print();
    });

    let id = 1;

    add.addEventListener('click', () => {
        let newElement = document.createElement('div');
        newElement.id = id.toString();
        id++;
        newElement.classList.add('draggable', 'ui-widget-content', 'whitespace-nowrap');
        newElement.innerText = textContent.value;

        page.append(newElement);

        $(() => {
            $('#' + newElement.id).draggable({
                containment: '#page',
                scroll: false,
                start: (e) => {
                    active = e.target;
                },
                drag: (e) => {
                    xPos.value = Math.round(e.target.getBoundingClientRect().left - page.getBoundingClientRect().left);
                    yPos.value = Math.round(e.target.getBoundingClientRect().top - page.getBoundingClientRect().top);
                }
            });
        });

        newElement.addEventListener('click', () => {
            active = newElement;
            xPos.value = Math.round(active.getBoundingClientRect().left - page.getBoundingClientRect().left);
            yPos.value = Math.round(active.getBoundingClientRect().top - page.getBoundingClientRect().top);
            console.log(newElement);
        });

        textContent.value = '';
    });

</script>
</body>
</html>
