def cetak(panjang):
  panjang = int(panjang) #parsing to int
  if(panjang%2==0):
    print('Panjang harus bernilai ganjil')
  else :
    print('---\t\tpanjang\t\t---')
    for i in range(0, panjang):
      if(i == int(panjang/2)):
        print('+\t+\t+\t+\t+')
      else:
        print('+\t=\t=\t=\t+')

  
print('masukkan panjang: ', end='')
panjang = input()
cetak(panjang)  