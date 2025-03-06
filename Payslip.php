<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Slip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        /* Styles for the payment slip */
        #payment-slip {
            width: 800px; /* A5 width */
            height: auto; /* A5 height */
            padding: 20px;
            margin: 5% auto;
            box-sizing: border-box;
        }

        /* Styles for the payment details */
        .payment-details {
            border: 1.5px solid #000;
            margin: 10px;
            padding: 10px;
        }

        /* Styles for the table */
        #payment-table {
            margin: 15px;
            padding: 10px;
            width: 95%;
        }

        /* Styles for the table cells */
        #payment-table td {
            padding: 10px;
        }

        /* Styles for the button */
        #download-btn {
            margin-bottom: 20px;
            margin-right: 25px;
            float: right;
        }

        /* Styles for the paragraph */
        #payment-slip p {
            margin-top: 20px;
        }

        /* Styles for the logo */
        #logo {
            max-width: 100px; 
        }

        /* Styles for the headerslip */
        .headerslip .logo {
            display: flex;
            align-items: center;
            margin: 0 15px;
        }

        .headerslip .logo h4 span {
            font-family: 'Comic Sans MS', sans-serif;
            font-weight: bolder;
            font-size: 20px;
        }

        #go {
            color: #FF00FF;
        }

        #race {
            color: #0071f8;
        }
    </style>
</head>

<body>
    <button class="btn-primary" id="download-btn">Download Invoice</button>
    <div class="payment-slip" id="payment-slip">
        
        <div class="payment-details">
            <div class="headerslip">
                <div class="logo">
                    <img id="logo" src="images/goracingslogo.png" alt="Go Race"> 
                    <h4><span id="go">Go</span><span id="race">Racings</span></h4>
                </div>
            </div>
            
            <table id="payment-table" class="table table-bordered">
                <tr>
                    <td>
                        Name: Shubham Pingale<br>
                        Mobile No.: 9988776655<br>
                        Bank A/c No.: 0123456789<br>
                        Unique Code: AFX0012JH<br>
                        State: Maharashtra
                    </td>
                    <td>
                        Date: <span id="current-date"></span><br>
                        Invoice No.: <span id="invoice-number"></span><br>
                        Audience Fee: 500/-<br>
                        Transaction ID: 0987654321<br>
                        District: Dhule
                    </td>
                </tr>
                <tr>
                    <td>
                        Bank Name: [Insert Bank Name]<br>
                        Account Name: [Insert Account Name]<br>
                        IBAN: [Insert IBAN]
                    </td>
                    <td>
                        Bank Address: [Insert Bank Address]<br>
                        Account Number: [Insert Account Number]<br>
                        SWIFT/BIC: [Insert SWIFT/BIC]
                    </td>
                </tr>
            </table>
        </div>
        <p>For any queries related to this payment, contact us at [Contact Information].</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const currentDate = new Date().toLocaleDateString('en-US', { month: 'long', day: '2-digit', year: 'numeric' });
            document.getElementById('current-date').innerText = currentDate;
            document.getElementById('invoice-number').innerText = generateInvoiceNumber();
        });
    
        document.getElementById('download-btn').addEventListener('click', () => {
            html2canvas(document.getElementById('payment-slip'), { useCORS: true, scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
    
                const { jsPDF } = window.jspdf;
                // Create a jsPDF instance with A4 dimensions
                const pdf = new jsPDF('p', 'mm', 'a4');
    
                // Calculate dimensions to maintain aspect ratio
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
    
                // Add the image to the PDF
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
    
                // Save the PDF
                pdf.save('payment_invoice.pdf');
            }).catch(error => {
                console.error('Error capturing the canvas:', error);
            });
        });
    
        function generateInvoiceNumber() {
            return 'INV' + Math.floor(Math.random() * 1000000);
        }
    </script>
    
    
</body>

</html>
