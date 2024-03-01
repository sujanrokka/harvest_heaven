@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>View Orders</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @vite('resources/css/app.css')
    </head>

    <body>
        @include('components.header')

        <div class="container mx-auto p-8">
            <div class="bg-white shadow-md rounded-lg card" id="inoviceeeee">
                <div class="px-6 py-4 border-b border-gray-200 card-header">
                    <h1 class="text-lg font-semibold">Invoice</h1>
                    <p class="text-sm text-gray-500">Invoice #12345 | Date: {{ $b->updated_at }}</p>
                </div>
                <div class="px-6 py-4 card-header">
                    <div class="flex justify-between mb-4">
                        <div>
                            <h2 class="text-sm font-semibold">Billed To</h2>
                            <p class="text-sm">{{ $b->user->name }}</p>
                            <p class="text-sm">123 Main Street</p>
                            <p class="text-sm">City, State ZIP</p>
                        </div>
                        <div>
                            <h2 class="text-sm font-semibold">Invoice Total</h2>
                            <p class="text-lg font-semibold">{{ $b->product->price }}</p>
                        </div>
                    </div>
                    <table class="w-full mb-8 table">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-2 text-sm font-semibold text-gray-600">Description</th>
                                <th class="pb-2 text-sm font-semibold text-gray-600">Qty</th>
                                <th class="pb-2 text-sm font-semibold text-gray-600">Price</th>
                                <th class="pb-2 text-sm font-semibold text-gray-600">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 text-center">
                                <td class="py-2 text-sm">{{ $b->product->name }}</td>
                                <td class="py-2 text-sm">1</td>
                                <td class="py-2 text-sm">{{ $b->product->price }}</td>
                                <td class="py-2 text-sm">{{ $b->product->price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button class="bg-blue-500 text-white py-2 px-4 rounded-md mr-4" id="downloadPdf">Download PDF</button>
                <button class="bg-green-500 text-white py-2 px-4 rounded-md" id="printBill">Print Bill</button>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            $('#printBill').click(function(e) {
                e.preventDefault();
                var invoicePreviewContent = document.getElementById('inoviceeeee').innerHTML;
                var printWindow = window.open('', '_blank');

                printWindow.document.write('<html><head><title>Print Preview</title>');
                printWindow.document.write(
                    `<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">`
                );
                printWindow.document.write('</head><body>');
                printWindow.document.write(invoicePreviewContent);
                printWindow.document.write('</body> </html>');

                printWindow.document.close(); // Close the document to enable printing
                printWindow.print();
            });

            $('#downloadPdf').click(function(e) {
                e.preventDefault();
                generatePDF('inoviceeeee');

            });

            function generatePDF(id) {
                var element = document.getElementById(id);
                var opt = {
                    margin: 0,
                    filename: 'bill.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 1
                    },
                    html2canvas: {
                        scale: 1
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait',
                        precision: '12'
                    }
                };
                html2pdf().set(opt).from(element).save();
            }
        </script>
    </body>

    </html>
@endauth
