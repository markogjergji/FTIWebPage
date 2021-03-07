<html>
    <head>
        <script src='https://cdn.tiny.cloud/1/6orenx6fs8b9ela20tcfcoqzf4t9s6npqeefednfsee5jmzo/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
        <script>
                tinymce.init({
                selector: 'textarea',
                plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'],

                image_list: [
                {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
                {title: 'My image 2', value: 'f1.jpg'}
                ]
            });
        </script>
    </head>
    <body>
        <div id="editor">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
                <div id="select-list">
                    <select required name="contentSection" id="contentSection">
                        <option value="" disabled selected hidden>Select Topic</option>
                        <option value="lajme">Lajme</option>
                        <option value="evente">Evente</option>
                        <option value="njoftime">Njoftime</option>
                        <option value="fakulteti main">Fakulteti Main</option>
                        <option value="fakulteti stafi">Fakulteti Stafi</option>
                        <option value="fakulteti administrata">Fakulteti Administrata</option>
                        <option value="fakulteti departamentet">Fakulteti Departamentet</option>
                        <option value="kurset main">Kurset Main</option>
                        <option value="kurset bachelor">Kurset Bachelor</option>
                        <option value="kurset master">Kurset Master</option>
                        <option value="kurset doktor">Kurset Doktor</option>
                        <option value="studentet main">Studentet Main</option>
                        <option value="studentet bursa">Studentet Bursa</option>
                        <option value="studentet tjera">Studentet Tjera</option>
                        <option value="kerkimi shkencor main">Kerkimi Shkencor Main</option>
                        <option value="kerkimi shkencor fushat">Kerkimi Shkencor Fushat</option>
                        <option value="kerkimi shkencor projekte">Kerkimi Shkencor Projekte</option>
                        <option value="kerkimi shkencor lab">Kerkimi Shkencor Lab</option>
                        <option value="kerkimi shkencor grupet">Kerkimi Shkencor Grupet</option>
                        <option value="karriere main">Karriere Main</option>
                        <option value="karriere praktike">Karriere Praktike</option>
                        <option value="karriere tregu">Karriere Tregu</option>
                        <option value="karriere tjera">Karriere Tjera</option>
                        <option value="rregullore">Rregullore</option>
                        <option value="rreth fti">Rreth FTI</option>
                        <option value="dep info">Departamenti i Inxhinierisë Informatike</option>
                        <option value="dep elek">Departamenti i Elektronikës dhe Telekomunikacionit</option>
                        <option value="dep baza">Departamenti i Bazave të Informatikës</option>
                    </select>
                </div>
                <label for="fname">Title:</label>
                <input type="text" id="title" name="title" required>
                <textarea id="mytextarea" name="createdPost"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>