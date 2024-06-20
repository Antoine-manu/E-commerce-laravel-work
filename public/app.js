
// document.addEventListener('DOMContentLoaded', function() {
//     const boutonsPanier = document.querySelectorAll('.panier'); // Sélectionner tous les boutons "panier"
  
//     boutonsPanier.forEach(bouton => {
//       bouton.addEventListener('click', function(event) {
//         const idProduit = event.target.dataset.id; // Récupérer le data-id du bouton
//         const panier = JSON.parse(localStorage.getItem('panier')) || {}; // Obtenir le panier du localStorage ou créer un nouveau tableau
  
//         // Vérifier si le produit est déjà dans le panier
//         if (panier[idProduit]) {
//           panier[idProduit].quantite++; // Incrémenter la quantité si le produit existe déjà
//         } else {
//           panier[idProduit] = { id: idProduit, quantite: 1 }; // Ajouter le produit au panier avec une quantité de 1
//         }
  
//         // Enregistrer le panier mis à jour dans le localStorage
//         localStorage.setItem('panier', JSON.stringify(panier));
  
//         // Afficher un message de confirmation (facultatif)
//         alert('Produit ajouté au panier !');
//       });
//     });
//   });