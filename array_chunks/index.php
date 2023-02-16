<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Chunks</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.5/js/foundation.min.js" integrity="sha512-xpawU2EKh0HLTLWu8khGczejw+OaWWr+JBcbFBWtRUIkkhuMRZZeEFxY0n51aeC9YF4jxOMzd0pTR9m0tiSvsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.5/css/foundation-float.min.css" integrity="sha512-COhcCg6IPtpBb4rDu3fJb+MOVP8vjJmoASF9jl8KoPQwQTlh3pKBE7FHPBPLnd3jV/ZJ77g+8haAFlNwtkOi1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .grid-container {
            padding: 0 20%;
        }
        section {
            margin-bottom: 60px;
        }
        code {
            width: 100%;
            float: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="grid-x">

            <div class="cell small-12">
                <section>
                    <h1>Array Chunks</h1>
                    <hr>
                </section>  
            </div>

            <div class="cell small-12">
                <section>
                    <h5>Prompt Response #1</h5>
                    <code>
                        Here's an example of how you can use array_chunk() with AJAX in PHP to handle large amounts of data from an array: Assuming you have a large array of data that you want to process in smaller chunks and send to the server using AJAX, you can do something like the following:
                    </code>
                </section>
            </div>

            <div class="cell small-12">
                <section>
                    <h5>Output</h5>

                    <div class="output">

                    </div>
                </section>
            </div>

            <div class="cell small-12">
                <section>
                    <h5>Prompt Response #2</h5>
                    <code>The code, array_chunk() is used to break the large array into smaller chunks based on the specified chunk size. Then, the chunks are looped through and sent to the server using AJAX. Inside the loop, the chunk is encoded as JSON using json_encode(), and then sent to the server using $.ajax(). The server can then process the data in process_data.php and send back a response, which is logged to the console in the success callback of the AJAX call.</code>

                    <code>
                    Note that this is just a basic example, and you would need to modify it based on your specific requirements. Also, make sure to handle errors and other potential issues that may arise when processing large amounts of data.
                    </code>
                </section>
            </div>
        </div>
    </div>

    <script>
            var data = [
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape',
                'apple', 'banana', 'cherry', 'date', 'elderberry', 'fig', 'grape'
            ];
            var chunkSize = 3;
            var chunks = array_chunk(data, chunkSize);

            console.log('====================================');
            console.log({chunks});
            console.log('====================================');

            // *** Fire every 1 second:
            var index = 0;
            var intervalId = setInterval(function() {
                if (index >= chunks.length) {
                    clearInterval(intervalId);
                    $(".output").append("<div><b>Query finished</b></div>");
                    return;
                }

                var chunk = chunks[index];
                var jsonData = JSON.stringify(chunk);

                $.ajax({
                    type: "POST",
                    url: "process_data.php",
                    data: {
                        "data" : jsonData
                    },
                    success: function(response) {
                        console.log({response})
                        $(".output").append("<div class='response-data'>"+ response +"</div>");
                    }
                }) 

                index++;
            }, 250);

            function array_chunk(array, size) {
                var result = [];

                for (var i = 0; i < array.length; i += size) {
                    result.push(array.slice(i, i + size));
                }

                return result;
            }
    </script>
</body>
</html>