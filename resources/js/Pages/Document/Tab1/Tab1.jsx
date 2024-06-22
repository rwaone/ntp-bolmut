import Blok1 from "../Blok1/Blok1";
import Blok2 from "../Blok2/Blok2";

const Tab1 = ({ blok1, blok2 }) => {
    // console.log({ blok1, blok2 });
    return (
        <div className="flex flex-col space-y-6">
            <Blok1
                nama_bulan={blok1.nama_bulan}
                tahun={blok1.tahun}
                nama_kabupaten={blok1.nama_kabupaten}
                kode_kabupaten={blok1.kode_kabupaten}
                nama_kecamatan={blok1.nama_kecamatan}
                kode_kecamatan={blok1.kode_kecamatan}
                nama_desa={blok1.nama_desa}
                kode_desa={blok1.kode_desa}
                respondent_name={blok1.respondent_name}
            />
            <Blok2
                petugas_nip={blok2.petugas_nip}
                pemeriksa_nip={blok2.pemeriksa_nip}
            />
        </div>
    );
};

export default Tab1;
