from pyzbar.pyzbar import decode
from PIL import Image
import cv2


# klasa decoded_barcode dla łatwiejszego wywoływania danych, wystarczy dać jej zdjęcie na kótrym gdzieś jest kod kreskowy
class barcode_img:
    def __init__(self,img):
        decoded = decode(cv2.imread(img))
        for i in decoded:
            self.data    = i.data.decode("UTF-8")
            self.type    = i.type
            self.rect    = i.rect
            self.polygon = i.polygon

