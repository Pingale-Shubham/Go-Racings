// JavaScript code for handling PDF generation
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.download-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            const serial = button.getAttribute('data-serial');
            const name = button.getAttribute('data-name');
            const address = button.getAttribute('data-address');
            const raceDate = button.getAttribute('data-racedate');
            const lastAdmission = button.getAttribute('data-lastadmission');
            const payment = button.getAttribute('data-payment');
            const audience = button.getAttribute('data-audience');
            const participant = button.getAttribute('data-participant');
            const prizeOne = button.getAttribute('data-prizeone');
            const prizeTwo = button.getAttribute('data-prizetwo');
            const prizeThree = button.getAttribute('data-prizethree');
            const prizeFour = button.getAttribute('data-prizefour');
            const prizeFive = button.getAttribute('data-prizefive');
            const prizeSix = button.getAttribute('data-prizesix');
            const prizeSeven = button.getAttribute('data-prizeseven');
            const token = button.getAttribute('data-token');
            const userEmail = button.getAttribute('data-useremail');
            const userMobile = button.getAttribute('data-usermobile');
            const paymentId = button.getAttribute('data-paymentid'); 

            const currentDate = new Date().toLocaleDateString('en-US', { month: 'long', day: '2-digit', year: 'numeric' });
            const invoiceNumber = 'INV' + Math.floor(Math.random() * 1000000);

            const slipContent = `
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .payment-slip {
                width: 210mm;
                margin: 5mm;
                padding: 8mm;
                box-sizing: border-box;
                border: 1px solid #000;
                background-color: #fff;
            }
            .headerslip {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }
            .logo {
                display: flex;
                align-items: center;
            }
            #logo {
                max-width: 100px; 
            }
            .logo h4 {
                margin-left: 10px;
                font-size: 24px;
            }
            #go {
                color: #FF00FF;
            }
            #race {
                color: #0071f8;
            }
            .payment-details {
                margin-bottom: 20px;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                font-size: 16px;
            }
            .table, .table th, .table td {
                border: 1px solid #000;
            }
            .table th, .table td {
                padding: 10px;
                text-align: left;
            }
            .table th {
                background-color: #f2f2f2;
            }
            p {
                margin-top: 20px;
                font-size: 14px;
            }
            </style>
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
                                Name: ${name}<br>
                                Address: ${address}<br>
                                Race Date: ${raceDate}<br>
                                Race Last Admission: ${lastAdmission}<br>
                                Race Payment: ${payment}<br>
                                Payment ID: ${paymentId}<br>
                                User Email: ${userEmail}<br>
                                User Mobile: ${userMobile}
                            </td>
                            <td>
                                Audience Ticket Fee: ${audience}<br>
                                Participant Fee: ${participant}<br>
                                Prize Amount One: ${prizeOne}<br>
                                Prize Amount Two: ${prizeTwo}<br>
                                Prize Amount Three: ${prizeThree}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Prize Amount Four: ${prizeFour}<br>
                                Prize Amount Five: ${prizeFive}<br>
                                Prize Amount Six: ${prizeSix}<br>
                                Prize Amount Seven: ${prizeSeven}<br>
                                Race Token Number: ${token}
                            </td>
                            <td>
                                Date: ${currentDate}<br>
                                Invoice No.: ${invoiceNumber}<br>
                                [Additional Bank Details Here]
                            </td>
                        </tr>
                    </table>

                </div>
                <p style="text-align: center;">
                    For any queries related to this payment, please contact us at:<br><a href="mailto:goracings@swyomsoft.com">goracings@swyomsoft.com</a>/<a href="tel:+912040008444">020-40008444</a>
                </p>
            </div>
            `;

            const slipContainer = document.createElement('div');
            slipContainer.innerHTML = slipContent;
            slipContainer.style.position = 'absolute';
            slipContainer.style.left = '-9999px'; // Move off-screen
            document.body.appendChild(slipContainer);

            html2canvas(slipContainer, { useCORS: true, scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');

                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth() - 40; // Subtracting 40 to accommodate the 20mm margin on each side
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 20, 20, pdfWidth, pdfHeight); // Adding 20mm margin
                pdf.save(`${token}.pdf`);

                document.body.removeChild(slipContainer);
            }).catch(error => {
                console.error('Error capturing the canvas:', error);
                document.body.removeChild(slipContainer);
            });
        });
    });
});

