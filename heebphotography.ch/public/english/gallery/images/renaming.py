from os import listdir
from os.path import isfile, join
from os import rename

images_dir = input("Path to images:")

all_images = [f for f in listdir(images_dir) if isfile(join(images_dir, f))]
