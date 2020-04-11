package id.ac.unpas.webservice;

public class BiodataActivity extends KoneksiActivity {
    // Source Code untuk URL -> URL menggunakan IP Address yang didapat dari komputer / laptop
    String URL = " http://192.168.1.109/tips_crud_android_json_mysql/server.php";
    String url = "";
    String response = "";

    // Menampilkan biodata dari database
    public String tampilBiodata() {
        try {
            url = URL + "?operasi=view";
            System.out.println("URL Tampil Biodata : " + url);
            response = call(url);
        }
        catch (Exception e) {
        }
        return response;
    }

    // Memasukkan data biodata baru ke database
    public String insertBiodata(String nama, String alamat) {
        try {
            url = URL + "?operasi=insert&nama=" + nama + "&alamat=" + alamat;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        }
        catch (Exception e) {
        }
        return  response;
    }

    // Melihat biodata yang diinginkan melalui ID
    public String getBiodataById (int id) {
        try {
            url = URL + "?operasi=get_biodata_by_id&id=" + id;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        }
        catch (Exception e) {
        }
        return response;
    }

    // Mengubah isi biodata yang sudah ada di database
    public String updateBiodata (String id, String nama, String alamat) {
        try {
            url = URL + "?operasi=update&id=" + id + "&nama=" + nama + "&alamat=" + alamat;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        }
        catch (Exception e) {
        }
        return response;
    }

    // Menghapus salah satu biodata pada database
    public String deleteBiodata (int id) {
        try {
            url = URL + "?operasi=delete&id=" + id;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        }
        catch (Exception e) {
        }
        return response;
    }
}