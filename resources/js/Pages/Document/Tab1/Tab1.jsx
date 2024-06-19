import Blok1 from "../Blok1/Blok1";
import Blok2 from "../Blok2/Blok2";

const Tab1 = ({ blok1, blok2 }) => {
    return (
        <div className="flex flex-col space-y-6">
            <Blok1
                bulan={blok1.bulan}
                tahun={blok1.tahun}
                provinsi={blok1.provinsi}
                kode_provinsi={blok1.kode_provinsi}
                kabkot={blok1.kabkot}
                kode_kabkot={blok1.kode_kabkot}
                kecamatan={blok1.kecamatan}
                kode_kecamatan={blok1.kode_kecamatan}
            />
            <Blok2
                petugas_nip={blok2.petugas_nip}
                pemeriksa_nip={blok2.pemeriksa_nip}
            />
        </div>
    );
};

export default Tab1;
