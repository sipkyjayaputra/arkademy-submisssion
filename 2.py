def cetak(panjang):
  panjang = int(panjang) #parsing to int
  if(panjang%2==0):
    print('Panjang harus bernilai ganjil')
  else :
    print('---\t\tpanjang\t\t---')
    for i in range(0, panjang):
      print('\n')
      if(i == int(panjang/2)):
        for i in range(0, panjang):
          print('+\t', end='')
      else:
        for i in range(0, panjang):
          if(i==0 or i==(panjang-1)):
            print('+\t', end='')
          else:
            print('=\t', end='')

  
print('masukkan panjang: ', end='')
panjang = input()
cetak(panjang)  