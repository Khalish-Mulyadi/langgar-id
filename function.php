<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "langgar_id";

$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function daftar($data) {
global $conn;

$uid = rand(time(), 100000000);
$nama        =mysqli_real_escape_string($conn,$data['nama']);
$gender    =mysqli_real_escape_string($conn,$data['gender']);
$alamat       =mysqli_real_escape_string($conn,$data['alamat']);
$telepon         =mysqli_real_escape_string($conn,$data['telepon']);

$email    =mysqli_real_escape_string($conn,$data['email']);
$password = mysqli_real_escape_string($conn,$data['pass']);
$cpassword    =mysqli_real_escape_string($conn,$data['cpass']);

$profesi    =mysqli_real_escape_string($conn,$data['profesi']);
$facebook    =mysqli_real_escape_string($conn,$data['facebook']);
$twitter    =mysqli_real_escape_string($conn,$data['twitter']);
$instagram    =mysqli_real_escape_string($conn,$data['instagram']);

$gambar = upload();
if ( !$gambar) {
    return false;
}

// check if there was a taken email/username
$checkEmail = mysqli_query($conn, "SELECT email FROM guru_ngaji WHERE
email = '$email'");
if ( mysqli_fetch_assoc($checkEmail) ) {
    echo "<script>
            alert('this username is already taken!');    
        </script>";
    return false;
}

// this will prevent user from using a space/empty username
if ( empty(trim($email)) ) {
    echo "<script>
            alert('please input proper username!');    
        </script>";
    
    return false;
}

if ( empty(trim($password)) ) {
    echo "<script>
            alert('please input proper password!');    
        </script>";
    
    return false;
}

// check if the password confirmation is same as the password
if ( $password !== $cpassword ) {
    echo "<script>
                alert('your password confirmation is incorrect!');
            </script>";
    
    return false;
}
$endpassword = password_hash($cpassword, PASSWORD_DEFAULT);


// insert query
$query = "INSERT INTO guru_ngaji  VALUES 
('','$uid','$nama','$gender', '$telepon', '$alamat', 
'$email', '$endpassword', 
'$profesi', '$facebook', '$twitter', '$instagram', '$gambar')";
mysqli_query($conn,$query);

// to return the value if the data/query successfully executed
return mysqli_affected_rows($conn);

}

function upload()
    {
        // this is the upload fucntion for images/files
        
        // we will store each value from $_FILES assoc array into variables
        $fileName = $_FILES['gambar']['name'];
        $fileSize = $_FILES['gambar']['size'];
        $fileError = $_FILES['gambar']['error']; // this will be use to check if the files has been uploaded or not
        $fileTempDir = $_FILES['gambar']['tmp_name'];
        $tipe_file = $_FILES['gambar']['type'];
        
        $fileValidExtensions = ['jpg', 'jpeg', 'png'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileExtension = explode('.', $fileName);
        $userFileExtension = strtolower(end($fileExtension));
        
        
        // check if wether user uploaded file or not 
        if ($fileError === 4) {
            echo "<script>
                        alert('please upload the file/image!')  
                  </script>";
            return false;
        }



        if (!in_array($ext, $fileValidExtensions)) {
            echo "<script>
                    alert('file/image type wrong!')  
                </script>";
            return false; 
        }


        // check if the file/image size exceeds certain amount
        if ( $fileSize > 10000000 ) {
            echo "<script>
                    alert('file/image size is to big!')  
                </script>";
            return false;   
        }
        $random = uniqid();
        $newFileName = $random.'.'.$ext;
        $destPath = "../assets/images/profilepic/".$random.'.'.$ext;
        move_uploaded_file($fileTempDir, $destPath);
        return $newFileName;

    }

    function update($data)
    {
        global $conn;

        $id        = $data['id'];
        $uid        = $data['uid'];
        $gender    = $data['gender'];
        

        $nama        =mysqli_real_escape_string($conn,$data['nama']);
        $alamat       =mysqli_real_escape_string($conn,$data['alamat']);
        $telepon         =mysqli_real_escape_string($conn,$data['telepon']);

        $email    =mysqli_real_escape_string($conn,$data['email']);
        // $password = mysqli_real_escape_string($conn,$data['pass']);
        // $cpassword    =mysqli_real_escape_string($conn,$data['cpass']);

        $profesi    =mysqli_real_escape_string($conn,$data['profesi']);
        $facebook    =mysqli_real_escape_string($conn,$data['facebook']);
        $twitter    =mysqli_real_escape_string($conn,$data['twitter']);
        $instagram    =mysqli_real_escape_string($conn,$data['instagram']);

        $gambarOld    =mysqli_real_escape_string($conn,$data['gambarOld']);

        // check if the password confirmation is same as the password
        // if ( $password !== $cpassword ) {
        //     echo "<script>
        //                 alert('your password confirmation is incorrect!');
        //             </script>";

        //     return false;
        // }
        // $endpassword = password_hash($cpassword, PASSWORD_DEFAULT);

        if ( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarOld;
        } else {
            $gambar = upload();
        }

        
        // update query
        $updatequery = "UPDATE guru_ngaji SET
                    id = '$id', 
                    uid = '$uid', 
                    nama = '$nama', 
                    gender = '$gender', 
                    telepon = '$telepon',
                    alamat = '$alamat',  
                    email = '$email', 
                    profesi = '$profesi', 
                    facebook = '$facebook', 
                    twitter = '$twitter',
                    instagram = '$instagram',
                    gambar = '$gambar' 
                    WHERE uid = '$uid'";
        mysqli_query($conn, $updatequery);

        // to return the value if the data/query successfully executed
        return mysqli_affected_rows($conn);



    }


?>